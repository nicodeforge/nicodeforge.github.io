window.onSpotifyWebPlaybackSDKReady = () => {

var url = $.url();
	
  const token = $.url(window.location.href).fparam('access_token');
  const player = new Spotify.Player({
    name: 'Web Playback Renforcement',
    getOAuthToken: cb => { cb(token); },
    volume: 0.5
  });

  // Error handling
  /*
  player.addListener('initialization_error', ({ message }) => { console.error(message); });
  player.addListener('authentication_error', ({ message }) => { console.error(message); });
  player.addListener('account_error', ({ message }) => { console.error(message); });
  player.addListener('playback_error', ({ message }) => { console.error(message); });
*/
  // Playback status updates
  player.addListener('player_state_changed', state => { 
  	
  	if (!state.paused) {
  		$('#play').html('<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pause-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M5.5 3.5A1.5 1.5 0 0 1 7 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5zm5 0A1.5 1.5 0 0 1 12 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5z"/></svg>');
  		$('.currently-playing').text(state.track_window.current_track.name+' de la playlist '+state.context.metadata.context_description);
  	}
  	if (state.paused) {
  		$('#play').html('<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-play" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.804 8L5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z"/></svg>');
  	}
  	console.log(state);
  	console.log("Is paused "+state.paused);

  	});

  // Ready
  player.addListener('ready', ({ device_id }) => {
    console.log('Ready with Device ID', device_id);
  });

  // Not Ready
    player.addListener('not_ready', ({ device_id }) => {
      console.log('Device ID has gone offline', device_id);
    });

    // Connect to the player!
    player.connect();

    //Custom controls
    $('#play').click(function(){
    	player.togglePlay().then(() => {
    	  console.log('Toggled playback!');
    	  
    	});
    });

    $('#next').click(function(){
    	player.nextTrack().then(() => {
    	  console.log('Skipped to next track!');
    	});
    });

    $('#next').click(function(){
	    player.previousTrack().then(() => {
	      console.log('Set to previous track!');
	    });
	});


    var expire = $.url(window.location.href).fparam('expires_in');

  };