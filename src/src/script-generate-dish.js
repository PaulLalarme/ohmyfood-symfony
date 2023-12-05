document.addEventListener("DOMContentLoaded", function () {
    initDishToDatabaseForm();
});

const initDishToDatabaseForm = () => {
    const submit = document.getElementById("generate-code");

    submit
    && submit.addEventListener("click", () => {
        generateDishToDatabase();
    })
}

const generateDishToDatabase = () => {

    const result = document.getElementById("html-code")

    const title = document.getElementById("title").value
    const subtitle = document.getElementById("subtitle").value
    const price = document.getElementById("price").value
    const type = document.getElementById("type").value
    const idRest = document.getElementById("idRest").value


}

