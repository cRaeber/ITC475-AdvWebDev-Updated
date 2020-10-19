
function Greeting() {
    var timeOfDay = "";
    var today = new Date();

    var hour = today.getHours();
    hour = (hour < 10 ? "0" : "") + hour;

    var minute = today.getMinutes();
    minute = (minute < 10 ? "0" : "") + minute;

    var second = today.getSeconds();
    second = (second < 10 ? "0" : "") + second;

    if (hour <= 11) {
        timeOfDay = "Mourning";
    }
    else if (hour >= 12 && hour <= 16) {
        timeOfDay = "Afternoon";
    }
    else if (hour >= 17 && hour <= 24) {
        timeOfDay = "Evening"
    }

    if (hour > 12) { hour -= 12 };
    var time = hour + ":" + minute + ":" + second;

    return (
        React.createElement("h3", { id: "Welcome" }, " Good ", timeOfDay, "! ", React.createElement("p", { id: "WelcomeTime" }), time));
}

function Tick() {
    ReactDOM.render(React.createElement("div", null, React.createElement(Greeting, null)),
        document.getElementById("WelcomeBar"));
}
setInterval(Tick, 500); 