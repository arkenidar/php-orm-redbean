function $sel(selector) {
    return document.querySelector(selector);
}

function $selAll(selectorAll) {
    return document.querySelectorAll(selectorAll);
}

function loadFragmentInto(URL, selector) {
    fetch(URL).then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.text();
    }).then(data => {
        /// console.log(data);
        $sel(selector).innerHTML = data;
    }).catch(error => console.error('There was a problem with the fetch operation:', error));
} // loadFragmentInto

function onSubmit(after = () => { }) {
    return function (event) {
        event.preventDefault();
        const form = event.target;
        /// console.log("on submit" + " : " + form.action);

        const formData = new FormData(form);
        fetch(form.action, {
            method: "POST",
            body: formData
        }).then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text(); // or .json() or .blob() ...
        }).then(data => {
            /// console.log(data);
            after(data);
        }).catch(error => console.error('There was a problem with the fetch operation:', error));

    }
} // onSubmit