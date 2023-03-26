// Basic Login functionlity

const tabSectionContainer = document.getElementById('tab-section-container');
// Tab container code
const tab_continer = document.getElementById('tab-li-container');
tab_continer.addEventListener('click',(e)=>{
  spinnerStart();
    const prevActiveTab = tab_continer.querySelector('.active-tab');
    if(e.target !== tab_continer){
        prevActiveTab.classList.remove('active-tab');
    }
    e.target.classList.add('active-tab');

    
    const prevText = prevActiveTab.innerText.toLowerCase();
    const prevId = prevText.replace(/\s+/g, '-');
    const PrevElement = document.getElementById(prevId);
    const clickTabElement = e.target;
    const currentText = clickTabElement.innerText.toLowerCase();
    const currentId = currentText.replace(/\s+/g, '-');
    console.log(currentId);
    const Element = document.getElementById(currentId);
    console.log(Element);

    if (Element.classList.contains('d-none')) {
      Element.classList.remove('d-none');
      PrevElement.classList.add('d-none');
    } else {
      console.log(`${currentId} element has the class not "d-none"`);
    }
    spinnerEnd();


    
});

// active status code
const statusEl = document.getElementById('active-status');
const onIconEl = statusEl.querySelector('.fa-toggle-on');
const offIconEl = statusEl.querySelector('.fa-toggle-off');

statusEl.addEventListener('click', function() {
  onIconEl.classList.toggle('d-none');
  offIconEl.classList.toggle('d-none');
});


// Spinner loading start

const spinnerStart = () => {
  // Show spinner after a 0-second delay
  document.getElementById('spinner').classList.remove('d-none');
}



const spinnerEnd = () =>{  
    document.getElementById('spinner').classList.add('d-none');
}

