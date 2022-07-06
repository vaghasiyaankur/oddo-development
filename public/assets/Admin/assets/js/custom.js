var toastMixin = Swal.mixin({
    toast: true,
    title: 'General Title',
    animation: true,
    position: 'top-right',
    showConfirmButton: false,
    timer: 1500,
    timerProgressBar: true,
    showCloseButton: true
});

// document.querySelector(".second").addEventListener('click', function() {
//     toastMixin.fire({
//         title: 'Signed in Successfully'
//     });
// });

// document.querySelector(".third").addEventListener('click', function() {
//     toastMixin.fire({

//         title: 'Wrong Password',
//         icon: 'error'
//     });
// });

