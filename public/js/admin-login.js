const login = () => {
    const user = {
        username: $('#username').val(),
        password: $('#password').val()
    }

    $.post('http://127.0.0.1:8000/api/admin/login', user).done((result => {
        console.log(result);
    }))
}