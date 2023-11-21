import Swal from 'sweetalert2';

(()=> {
    const alertResponse = document.querySelector("#alertElement"); 

    if (alertResponse){
        const responseData = JSON.parse(alertResponse.getAttribute('data-response')); 


        setTimeout(function(){
            Swal.fire({
                html: `<h1 class="logo">Art Zone</h1>
                    <h2 class="sweet__title sweet__title--${responseData.type}">${responseData.title}</h2>
                    <p class="sweet__text">${responseData.message}<p>
                `, 
                confirmButtonColor: '#84A98C', 
            })
        }, 5)
    }
})();