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

  console.log(data);
  console.log(data.ac);
  console.log(data.dc);
  console.log(data.down_time);
  console.log(AC_voltage);

  AC_voltage[0].innerHTML = `${data.ac}V`;
  Battery_percentage[0].innerHTML = `${data.dc}%`;


  data.down_time = 3432;

  if(data.down_time <= 0){

  }else{
    const hours = Math.floor(data.down_time / 3600);
    const minutes = Math.floor((data.down_time % 3600) / 60);
    const seconds = data.down_time - hours * 3600 - minutes * 60;

    Time_countdown[0].innerHTML = `<span class="green">↓</span>  ${hours} hrs ${minutes} mins`;
  }
}

fetchUsers();

