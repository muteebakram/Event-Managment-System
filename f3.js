//Initialize Firebase
  var config = {
    apiKey: "AIzaSyD4ccNRnzMNEfcrGqrTzjAJP49Xo47jLT8",
    authDomain: "event-management-system-4727d.firebaseapp.com",
    databaseURL: "https://event-management-system-4727d.firebaseio.com",
    projectId: "event-management-system-4727d",
    storageBucket: "event-management-system-4727d.appspot.com",
    messagingSenderId: "398161509541"
  };
  firebase.initializeApp(config);

//function to save file
function previewFile(){
  var storage = firebase.storage();

  var file = document.getElementById("files").files[0];
    console.log(file);
  
  var storageRef = firebase.storage().ref();
  
  //dynamically set reference to the file name
  var thisRef = storageRef.child(file.name);

  //put request upload file to firebase storage
  thisRef.put(file).then(function(snapshot) {
    console.log('Uploaded a blob or file!');
});
  
  //get request to get URL for uploaded file
  thisRef.getDownloadURL().then(function(url) {
  console.log(url);
  })

  }