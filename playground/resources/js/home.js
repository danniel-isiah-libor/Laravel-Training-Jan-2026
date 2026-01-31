const img_input = document.querySelector("#img_input");
const img_container = document.querySelector("#img_container");
const img_remove = document.querySelector("#img_remove");
const post_content = document.querySelector("#post_content");

img_input.addEventListener("change", previewImage);
img_remove.addEventListener("click", removeImage);

post_content.addEventListener("input", function () {
    this.style.height = "auto";
    this.style.height = this.scrollHeight + "px";
});

function previewImage(e) {
    const file = e.target.files[0];
    if (!file && !img_container.classList.contains("hidden")) {
        img_container.classList.add("hidden");
        return;
    }

    img_container.classList.remove("hidden");
    document.querySelector("#img_preview").src = URL.createObjectURL(file);
}

function removeImage() {
    img_input.value = null;
    img_input.dispatchEvent(new Event("change"));
}
