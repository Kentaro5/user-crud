window.onload = function() {
    let form = document.querySelector('form');
    if( form !== null ){

        //let form = document.querySelector('form');

        form.addEventListener('submit', (e) => {

            let submitButton = document.querySelector('button.submit');
            let deleteButton = document.querySelector('button.del');

            if( submitButton !== null ) {
                submitButton.disabled = true;
            }

            if( deleteButton !== null ) {
                let result = confirm('ユーザーを削除してもよろしいですか？');
                if( result === true ){
                    deleteButton.disabled = true;
                }else{
                    e.preventDefault();
                }
            }

        }, false);
    }


}
