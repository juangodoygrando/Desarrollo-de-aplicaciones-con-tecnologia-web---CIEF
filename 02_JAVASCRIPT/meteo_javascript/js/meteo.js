const meteoForm = document.forms["meteoForm"];

meteoForm.addEventListener("submit", (e) => {
  e.preventDefault();

  let city = meteoForm["city"].value.trim();
  //console.log(city)

  const units = "metric";
  let lang = "es";
  const appid = "761e204caa9eda6dde4b4646cf7a4e80";
  const URL1 = `https://api.openweathermap.org/data/2.5/weather?units=${units}&lang=${lang}&q=${city}&appid=${appid}`;

  //fetch:promesa
  fetch(URL1)
    .then((data) => data.json())
    .then((data) => {
      const description = `${data["weather"][0]["description"]}`;
      const icon = `${data["weather"][0]["icon"]}`;
      const temp = `${data["main"]["temp"]}`;
      const feels_like = `${data["main"]["feels_like"]}`;
      const temp_min = `${data["main"]["temp_min"]}`;
      const temp_max = `${data["main"]["temp_max"]}`;
      const humidity = `${data["main"]["humidity"]}`;
      const speed = `${data["wind"]["speed"]}`;
      const sunrise = `${data["sys"]["sunrise"]}`;
      const sunset = `${data["sys"]["sunset"]}`;

      document.getElementById(
        "iconNow"
      ).innerHTML = `<img src="https://www.imelcf.gob.pa/wp-content/plugins/location-weather/assets/images/icons/weather-icons/${icon}.svg" alt="${description}">`;
      document.getElementById(
        "description"
      ).textContent = `Descripcion del clima: ${description}`;
      document.getElementById("temp").textContent = `Temperatura: ${temp} °C`;
      document.getElementById(
        "feels_like"
      ).textContent = `Sensación térmica: ${feels_like} °C`;
      document.getElementById(
        "temp_min"
      ).textContent = `Temperatura mínima: ${temp_min} °C`;
      document.getElementById(
        "temp_max"
      ).textContent = `Temperatura máxima: ${temp_max} °C`;
      document.getElementById(
        "humidity"
      ).textContent = `Humedad: ${humidity} %`;
      document.getElementById(
        "speed"
      ).textContent = `Velocidad del viento: ${speed} m/s`;
      document.getElementById("sunrise").textContent =
        "Amanecer: " +
        new Date(sunrise * 1000).toLocaleTimeString("es-ES", {
          hour: "2-digit",
          minute: "2-digit",
        });

      document.getElementById("sunset").textContent =
        "Atardecer: " +
        new Date(sunset * 1000).toLocaleTimeString("es-ES", {
          hour: "2-digit",
          minute: "2-digit",
        });
    })
    .catch((error) => console.log(error));

  const URL2 = `https://api.openweathermap.org/data/2.5/forecast?units=${units}&lang=${lang}&q=${city}&appid=${appid}`;

  fetch(URL2)
    .then((data) => data.json())
    .then((data) => {
      let pronosticoHTML=""

      for (i = 1; i < 20; i++) {
        const fechaCompleta = data["list"][i]["dt_txt"]
        const [fecha, hora] = fechaCompleta.split(" ");

        const fechaSeparada = fecha;
        const horaSeparada = hora;
        const icon = data["list"][i]["weather"][0]["icon"];
        const description = data["list"][i]["weather"][0]["description"];
        const temp = data["list"][i]["main"]["temp"];
        const humidity = data["list"][i]["main"]["humidity"];

         pronosticoHTML+=`<div>
  <p class="fechaSeparada">${fechaSeparada}</p>
  <p class="horaSeparada">${horaSeparada}</p>
  <img src="https://www.imelcf.gob.pa/wp-content/plugins/location-weather/assets/images/icons/weather-icons/${icon}.svg" alt="${description}">
  <P class="temp">${temp}°C</P>
  <P class="humidity">${humidity}%</P>
</div>`;

      }
      document.getElementById("pronostico").innerHTML =pronosticoHTML
    })
    
    .catch((error) => console.log(error));
});
