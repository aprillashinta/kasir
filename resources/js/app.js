import './bootstrap';

window.rupiah = (value) => 'Rp. ' + value.toLocaleString('de-DE');

if(typeof errorMessage != 'undefined'){
    Swal.fire({
        title: 'Peringatan',
        text: errorMessage,
        icon: 'warning',
    });
}
