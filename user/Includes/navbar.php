
<!-- Navbar section -->
<header>
  <nav class=" px-3 navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="/../manpowerbd/index.php"><span class="font-M fs-4"><span class=" fs-2 text-uppercase color-org">M</span>anp<span class=" fs-2 text-uppercase color-org">o</span>wer<span class=" fs-2 text-uppercase color-org">bd</span></span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel"><a class="navbar-brand" href="../index.html"><span class="font-M fs-4"><span class=" fs-2 text-uppercase color-org">M</span>anp<span class=" fs-2 text-uppercase color-org">o</span>wer<span class=" fs-2 text-uppercase color-org">bd</span></span></a></h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link" href="user-profile.php">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Location
              </a>
              <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="#">Uposhor</a></li>
                <li><a class="dropdown-item" href="#">Talaimari</a></li>
                <li><a class="dropdown-item" href="#">Kajla</a></li>
                <li><a class="dropdown-item" href="#">Court Station</a></li>
                <li><a class="dropdown-item" href="#">Bornali</a></li>
                <li><a class="dropdown-item" href="#">Rail Gate</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Log Out</a>
            </li>
          </ul>
          <form class="d-flex mt-3" role="search" id="searchForm">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="searchInput">
            <button class="btn btn-success" type="submit">Search</button>
          </form>

        </div>
      </div>
    </div>
  </nav>
</header>

<script>
  document.getElementById('searchForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent form submission

    const searchQuery = document.getElementById('searchInput').value;
    console.log(searchQuery);

    // Make an asynchronous request to perform the search
    // You can use AJAX or fetch API to send a request to the server-side script

    // Example using fetch API
    fetch('search.php?q=' + searchQuery)
      .then(response => response.json())
      .then(data => {
        console.log(data)
        // Handle the search results here
        const workerContainer = document.getElementById('worker-container');
        workerContainer.innerHTML = ''; // Clear previous results

        data.forEach(worker => {
          const workerCard = `
        <div class="col">
          <div class="card mb-3 bg-card-black p-3">
            <h5 class="text-center light-gray font-M">Name: ${worker.worker_full_name}</h5>
            <div class="row g-0">
              <div class="col-md-5">
                <img class="img-fluid rounded-start" src="/../manpowerbd/worker/upload/${worker.worker_photo}" class="img-fluid rounded-start" alt="Image not found">
                <div class="ratings mb-2 text-warning">
                  <i class="fa-solid fa-star greenyellow-color"></i>
                  <i class="fa-solid fa-star greenyellow-color"></i>
                  <i class="fa-solid fa-star greenyellow-color"></i>
                  <i class="fa-solid fa-star greenyellow-color"></i>
                  <i class="fa-solid fa-star"></i>
                </div>
                <div class="text-white">
                  <p><span class="fw-bold">Charge:</span> 700TK</p>
                </div>
              </div>
              <div class="col-md-7">
                <div class="card-body">
                  <h5 class="card-title light-gray">${worker.workerType}</h5>
                  <p class="card-text light-gray"><i class="fa-solid fa-phone-volume"></i> ${worker.worker_phone_number}</p>
                  <address class="card-title light-gray">Address: ${worker.present_address}</address>
                  <div>
                    <a href="/../manpowerbd/user/worker-detail.php?id=${worker.worker_id}" class="btn btn-warning px-3 py-2 mt-3 font-M">
                      <i class="fa-regular fa-eye"></i> View Profile
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      `;
          workerContainer.insertAdjacentHTML('beforeend', workerCard);
        });
      })
      .catch(error => {
        console.log('Error:', error);
      });
  });
</script>