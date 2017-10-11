function postDataToWebhook(data){
  //get the values needed from the passed in json object
  var csv=data.csv,
      transporteur = data.transporteur,
      cout = data.cout;
  //url to your webhook
  var webHookUrl="https://hooks.zapier.com/hooks/catch/1160774/99obp0/";
  
  //https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest
  var oReq = new XMLHttpRequest();
  var myJSONStr = payload={
      "csv" : csv,
      "transporteur" : transporteur,
      "cout" : cout

  };
  
//register method called after data has been sent method is executed
  oReq.addEventListener("load", reqListener);
  oReq.open("POST", webHookUrl,true);
  oReq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  oReq.send(JSON.stringify(myJSONStr));
}
//callback method after webhook is executed
function reqListener () {
  console.log(this.responseText);
}

function getFormElements(){ 
  event.preventDefault(); // Empêche le rechargement de la page et l'effacement des champs du formulaire après le clic du bouton Submit
  var transporteur = document.forms["general"].elements["transporteur"].value, //Récupère tous les champs du formulaire et les stocks dans des variables
      fraisExpedition = document.forms["general"].elements["fraisExpedition"].checked, 
      typeExpedition = document.forms["general"].elements["typeExpedition"].value,
      first = document.forms["general"].elements["inputFirst"].value.toUpperCase(),
      last = document.forms["general"].elements["inputLast"].value.toUpperCase(),
      adress1 = document.forms["general"].elements["inputAdress1"].value.toUpperCase(),
      adress2 = document.forms["general"].elements["inputAdress2"].value.toUpperCase(),
      city = document.forms["general"].elements["inputCity"].value.toUpperCase(),
      zipCode = document.forms["general"].elements["inputZipCode"].value,
      email = document.forms["general"].elements["inputEmail"].value.toLowerCase(),
      tel = document.forms["general"].elements["inputTel"].value,
      marchandise = document.forms["general"].elements["inputMarchandise"].value.toUpperCase(),
      poids = parseInt(document.forms["general"].elements["inputPoids"].value);

  
  
  if (typeof tel == 'undefined'  ) {
    tel = "0606060606";
  } else{}

  if (typeof email == 'undefined' ) {
    email = "email@email.com";
  }else{}


  if (typeExpedition == "reexpe") {
    var billId = prompt("Merci d'indiquer le numéro de Bill Item de la marchandise à réexpédier"); // S'il s'agit d'une reexpé, on a besoin de l'identifiant "Bill Item" de la précédente expédition
  }else{
        billId = "000000"; //S'il s'agit d'une nouvelle expé, on utilise simplement le billItem "000000"
  }

  if (fraisExpedition === false) {
    if (transporteur == "colissimo"){
      var cout = (poids/100)*1.2;
      console.log(cout+" colissimo");
    }else{
          cout = (poids/100)*1.1;
          console.log(cout+" relai");
    }        
  }else{
    cout = 0;
    console.log(cout+" no carrier");
  }   

  if (transporteur == "colissimo") {
    var sep = ";",
        csv = "01"+sep+billId+sep+sep+"M."+sep+first+sep+last+sep+adress1+sep+adress2+sep+zipCode+sep+city+sep+tel+sep+email+sep+poids;

    
  }else{
        sep = "|",
        user_id = parseInt(prompt("Merci d'indiquer le numéro d'utilisateur du client concerné")),
        code_relai = prompt("Merci d'indiquer le code relai de destiantion");
        csv = billId+sep+"PM"+sep+"1"+sep+"1"+sep+poids+sep+poids+sep+user_id+sep+first+" "+last+sep+adress1+sep+adress2+sep+" "+sep+zipCode+sep+""+sep+city+sep+tel+sep+""+sep+email+sep+"REL"+sep+code_relai+sep+sep+sep+sep;

  }

  document.getElementById('csvMessage').innerHTML = "Et voilà !";
  document.getElementById('generated-csv').innerHTML = csv;
  data = {
    "cout" : cout,
    "csv" : csv,
    "transporteur" : transporteur
  }
  postDataToWebhook(data);
  
}