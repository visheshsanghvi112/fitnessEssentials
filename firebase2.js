const firebaseConfig = {
    apiKey: "AIzaSyD_ggEngnQtKj3qqwXuoVwjld7THLTgkCk",
    authDomain: "review-fa923.firebaseapp.com",
    databaseURL: "https://review-fa923-default-rtdb.firebaseio.com",
    projectId: "review-fa923",
    storageBucket: "review-fa923.appspot.com",
    messagingSenderId: "981732473823",
    appId: "1:981732473823:web:43d028e38de68cf6d9a26a",
    measurementId: "G-7Z6VT5WCMG"
};

firebase.initializeApp(firebaseConfig);

// reference your database
var reviewDB = firebase.database().ref("review");

document.getElementById("review").addEventListener("submit", submitForm);

function submitForm(e) {
    e.preventDefault();

    var name = getElementVal("name");
    var emailid = getElementVal("email");
    // var subject = getElementVal("subject");
    var msgContent = getElementVal("message");

    console.log(name, emailid, msgContent);

    saveMessages(name, emailid, msgContent);

    //   enable alert
    document.querySelector(".alert").style.display = "block";

    //   remove the alert
    setTimeout(() => {
        document.querySelector(".alert").style.display = "none";
    }, 3000);

    //   reset the form
    document.getElementById("contactForm").reset();
}

const saveMessages = (name, emailid, msgContent) => {
    var reviewDB = reviewDB.push();

    newContactForm.set({
        name: name,
        emailid: emailid,
        // subject: subject,
        msgContent: msgContent,
    });

    alert("Message Submitted!!");

    document.getElementById("contactForm").reset();
};

const getElementVal = (id) => {
    return document.getElementById(id).value;
};