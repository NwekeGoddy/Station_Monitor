//1. API url
const url =
  "https://www.velhect.com/station_monitor/api/request.php?sn=VELSM-001L&user=5c18a705dd6e85b850675864d79529a7";

// const url =
//   ("http://www.velhect.com/station_monitor/api/request.php?sn=testing123&user=5c18a705dd6e85b850675864d79529a7",{ mode: 'no-cors'});


//2. Fetch users from the ApI url
function fetchUsers() {
  // 2.1 Make use of the browser's fetch API
  fetch(url)
    .then((response) => response.json())
    .then((data) => {
      //2.2 Passing the user data to the renderUsers function

      renderUser(data);
    });
}

function renderUser(data) {
  const AC_voltage = document.getElementsByClassName(
    "station__voltage__value_p"
  );
  const Battery_percentage = document.getElementsByClassName(
    "station__inverterbattery__value_p"
  );
  const Time_countdown = document.getElementsByClassName(
    "station__powerind__icon"
  );

  AC_voltage[0].innerHTML = `${data.ac}V`;
  Battery_percentage[0].innerHTML = `${data.dc}%`;


  data.down_time= Math.floor(Math.random() * 1000000);

  if(data.down_time <= 0){
    Time_countdown[0].innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lightbulb-fill" viewBox="0 0 16 16">
    <path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13h-5a.5.5 0 0 1-.46-.302l-.761-1.77a1.964 1.964 0 0 0-.453-.618A5.984 5.984 0 0 1 2 6zm3 8.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1-.5-.5z"/>
    </svg>`;
  }else{
    const hours = Math.floor(data.down_time / 3600);
    const minutes = Math.floor((data.down_time % 3600) / 60);
    const seconds = data.down_time - hours * 3600 - minutes * 60;

    Time_countdown[0].innerHTML = `<span class="green">↓</span>  ${hours} hrs ${minutes} mins`;
  }

  console.log(data);
}

//Fetch API every second
window.setInterval(function() {
  // do stuff
  fetchUsers();
  console.log("repeat");
}, 1000); 
