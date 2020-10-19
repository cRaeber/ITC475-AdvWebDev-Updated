
function Icon() {

    var today = new Date();
    var hour = today.getHours();

    if (hour >= 6 && hour <= 18) {
        return (
            React.createElement("img", { src: "./Sun.png" }));
    }
    else {
        return (
            React.createElement("img", { src: "./moon.png" }));
    }

}


function Tick() {
    ReactDOM.render(React.createElement("div", null, React.createElement(Icon, null)),
        document.getElementById("SunMoonDisplay"));
}
setInterval(Tick, 500); 