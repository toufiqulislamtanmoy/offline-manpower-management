const load_data = () => {
    fetch('https://forbes400.onrender.com/api/forbes400?limit=12').then(res => res.json()).then(data => {displayuser(data) });
}

const displayuser = (user)=>{
    // console.log(user)
    const workerContainer = document.getElementById('worker-container');
    workerContainer.innerHTML = '';
    user.map(singleData =>{
        console.log(singleData.industries[0]);
        const singleWorker = document.createElement('div');
    singleWorker.classList.add('col');

    singleWorker.innerHTML = `
          <div class=" card mb-3 bg-card-black p-3">
            <h5 class=" text-center light-gray font-M">Name: ${singleData.person.name}</h5>
            <div class="row g-0">
              <div class="col-md-4">
                <img src="${singleData.person.squareImage}" class="img-fluid rounded-start" alt="Image not found">
                <h6 class="light-gray mt-3 text-center">Industris: ${singleData.industries[0]}</h6>
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
    `

    workerContainer.appendChild(singleWorker);
    })

    
}

load_data();
