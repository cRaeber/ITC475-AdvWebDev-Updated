ReactDOM.render(
    React.createElement("form", { id: 'adminForm', method: 'post', action: 'admin.php' },
        React.createElement('input', { className: 'button', type: 'submit', value: 'submit' })),
    document.getElementById('admins'));
