window.onload = function() {
    let form = document.querySelector('form');
    if( form !== null ){

        //let form = document.querySelector('form');

        form.addEventListener('submit', (e) => {

            let submitButton = document.querySelector('button.submit');
            submitButton.disabled = true;

        }, false);
    }


}
