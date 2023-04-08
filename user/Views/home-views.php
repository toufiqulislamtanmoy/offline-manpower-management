<script>
  const serviceProviders = [{
      "id": 1,
      "name": "Md. Abdul Ali",
      "address": "5/A, Mymensingh Road, Dhaka",
      "phone": "+8801712345678",
      "nationalId": "1987654321987",
      "type": "Electrician",
      "industry": "Construction",
      "rating": 4.5,
      "gender": "Male",
      "profile-image": ""
    },
    {
      "id": 2,
      "name": "Abdul Haque",
      "address": "2/B, Mirpur Road, Dhaka",
      "phone": "+8801712345679",
      "nationalId": "1234567891234",
      "type": "Plumber",
      "industry": "Construction",
      "rating": 4.2,
      "gender": "Male",
      "profile-image": ""
    },
    {
      "id": 3,
      "name": "Md. Ali Ahmed",
      "address": "12, Baridhara, Dhaka",
      "phone": "+8801712345680",
      "nationalId": "7654321098765",
      "type": "Carpenter",
      "industry": "Construction",
      "rating": 3.9,
      "gender": "Male",
      "profile-image": ""
    },
    {
      "id": 4,
      "name": "Rafiqul Islam",
      "address": "15, Uttara, Dhaka",
      "phone": "+8801712345681",
      "nationalId": "2345678912345",
      "type": "Mechanic",
      "industry": "Automotive",
      "rating": 4.1,
      "gender": "Male",
      "profile-image": ""
    },
    {
      "id": 5,
      "name": "Nasreen Akhter",
      "address": "7, Green Road, Dhaka",
      "phone": "+8801712345682",
      "nationalId": "6789012345678",
      "type": "Cook",
      "industry": "Food Service",
      "rating": 4.7,
      "gender": "Female",
      "profile-image": ""
    },
    {
      "id": 6,
      "name": "Kamal Hossain",
      "address": "10/B, Banani, Dhaka",
      "phone": "+8801712345683",
      "nationalId": "5432109876543",
      "type": "Painter",
      "industry": "Construction",
      "rating": 4.0,
      "gender": "Male",
      "profile-image": ""
    },
    {
      "id": 7,
      "name": "Shaheda Begum",
      "address": "15, Dhanmondi, Dhaka",
      "phone": "+8801712345684",
      "nationalId": "9876543210987",
      "type": "Housekeeper",
      "industry": "Hospitality",
      "rating": 4.6,
      "gender": "Female",
      "profile-image": ""
    },
    {
      "id": 8,
      "name": "Rahim Uddin",
      "address": "12, Rajshahi Road, Rajshahi",
      "phone": "+8801712345686",
      "nationalId": "3456789123456",
      "type": "Electrician",
      "industry": "Construction",
      "rating": 4.3,
      "gender": "Male",
      "profile-image": ""
    },
    {
      "id": 9,
      "name": "Fatima Begum",
      "address": "45, Rajshahi Bypass Road, Rajshahi",
      "phone": "+8801712345687",
      "nationalId": "7890123456789",
      "type": "Plumber",
      "industry": "Construction",
      "rating": 4.1,
      "gender": "Female",
      "profile-image": ""
    },
    {
      "id": 10,
      "name": "Siddique Rahman",
      "address": "22/A, University More, Rajshahi",
      "phone": "+8801712345688",
      "nationalId": "6543210987654",
      "type": "Carpenter",
      "industry": "Construction",
      "rating": 4.4,
      "gender": "Male",
      "profile-image": ""
    },
    {
      "id": 11,
      "name": "Ayesha Khanam",
      "address": "33, Vuter Goli, Rajshahi",
      "phone": "+8801712345689",
      "nationalId": "1234567890123",
      "type": "Cook",
      "industry": "Food Service",
      "rating": 4.8,
      "gender": "Female",
      "profile-image": ""
    },
    {
      "id": 12,
      "name": "Mahmud Hasan",
      "address": "5, Rajshahi Court Road, Rajshahi",
      "phone": "+8801712345690",
      "nationalId": "4567891234567",
      "type": "Painter",
      "industry": "Construction",
      "rating": 4.2,
      "gender": "Male",
      "profile-image": ""
    },
    {
      "id": 13,
      "name": "Abdul Karim",
      "address": "Raipara, Rajshahi",
      "phone": "+8801712345678",
      "nationalId": "1234567890123",
      "type": "Plumber",
      "industry": "Construction",
      "rating": 4.2,
      "gender": "Male",
      "profile-image": ""
    }, {
      "id": 14,
      "name": "Ayesha Akter",
      "address": "Horogram Bazzar, Rajshahi",
      "phone": "+8801712345679",
      "nationalId": "2345678901234",
      "type": "Carpenter",
      "industry": "Construction",
      "rating": 4.5,
      "gender": "Female",
      "profile-image": ""
    }, {
      "id": 15,
      "name": "Hasan Ali",
      "address": "Court Station, Rajshahi",
      "phone": "+8801712345680",
      "nationalId": "3456789012345",
      "type": "Electrician",
      "industry": "Construction",
      "rating": 4.1,
      "gender": "Male",
      "profile-image": ""
    }, {
      "id": 16,
      "name": "Mohammed Rahman",
      "address": "Vari Para, Rajshahi",
      "phone": "+8801712345681",
      "nationalId": "4567890123456",
      "type": "Painter",
      "industry": "Construction",
      "rating": 4.0,
      "gender": "Male",
      "profile-image": ""
    }, 
    {
      "id": 17,
      "name": "Fahmida Begum",
      "address": "Dorga Para, Rajshahi",
      "phone": "+8801712345682",
      "nationalId": "5678901234567",
      "type": "Mason",
      "industry": "Construction",
      "rating": 4.4,
      "gender": "Female",
      "profile-image": ""
    }
  ]


  window.onload = function() {
    const workerContainer = document.getElementById('worker-container');
    const displayWorker = (worker) => {
      // console.log(user)
      const workerContainer = document.getElementById('worker-container');
      workerContainer.innerHTML = '';
      worker.map(singleData => {
        console.log(singleData);
        const singleWorker = document.createElement('div');
        singleWorker.classList.add('col');

        singleWorker.innerHTML = `
          <div class=" card mb-3 bg-card-black p-3">
            <h5 class=" text-center light-gray font-M">Name: ${singleData.name} </h5>
            <div class="row g-0">
              <div class="col-md-4">
                <img src=${profile-image} class="img-fluid rounded-start" alt="Image not found">
                <h6 class="light-gray mt-3 text-center">Industris: ${singleData.industry} </h6>
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title light-gray">Type: ${singleData.type}</h5>
                  <p class="card-text light-gray"><i class="fa-solid fa-phone-volume"></i> ${singleData.phone}</p>
                  <div class="reatings mb-2 text-warning">
                    <i class="fa-solid fa-star greenyellow-color"></i>
                    <i class="fa-solid fa-star greenyellow-color"></i>
                    <i class="fa-solid fa-star greenyellow-color"></i>
                    <i class="fa-solid fa-star greenyellow-color"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>

                  <address class="card-title light-gray">Address: ${singleData.address}
                  </address>

                  <div>
                    <button class="btn btn-warning px-3 py-2 mt-3 font-M"><i class="fa-regular fa-eye"></i> View Profile</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
    `

        workerContainer.appendChild(singleWorker);
      })


    }

    displayWorker(serviceProviders);
  };
</script>


<section class="mt-7rem bg-light-gray p-5">
  <div id="worker-container" class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
    <div class="col">
      <div class=" card mb-3 bg-card-black p-3">
        <h4 class=" text-center light-gray font-M">Name: Toufiqul Islam Tanmoy</h4>
        <div class="row g-0">
          <div class="col-md-4">
            <img src="../img/prof-icon/profile_159x159.png" class="img-fluid rounded-start" alt="Image not found">
            <h6 class="light-gray mt-3 text-center">Source: Amazon</h6>
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title light-gray">Type: Driver</h5>
              <p class="card-text light-gray"><i class="fa-solid fa-phone-volume"></i> +880 18481-89482</p>
              <div class="reatings mb-2 text-warning">
                <i class="fa-solid fa-star greenyellow-color"></i>
                <i class="fa-solid fa-star greenyellow-color"></i>
                <i class="fa-solid fa-star greenyellow-color"></i>
                <i class="fa-solid fa-star greenyellow-color"></i>
                <i class="fa-solid fa-star"></i>
              </div>

              <address class="card-title light-gray">Address: Rajshahi Court, Rajshahi
              </address>

              <div>
                <button class="btn btn-warning px-3 py-2 mt-3 font-M"><i class="fa-regular fa-eye"></i> View Profile</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>