const openModalButtons = document.querySelectorAll('[data-modal-target]')
const closeModalButtons = document.querySelectorAll('[data-close-button]')
const overlay = document.getElementById('overlay')

openModalButtons.forEach(button => {
    button.addEventListener('click', () => {
        const modal = document.querySelector(button.dataset.modalTarget)
        openModal(modal)
    })
})

overlay.addEventListener('click', () => {
    const modals = document.querySelectorAll('.modal.active')
    modals.forEach(modal => {
        closeModal(modal)
    })
})

closeModalButtons.forEach(button => {
    button.addEventListener('click', () => {
        const modal = button.closest('.modal')
        closeModal(modal)
    })
})

function openModal(modal) {
    if (modal == null) return
    modal.classList.add('active')
    overlay.classList.add('active')
}

function closeModal(modal) {
    if (modal == null) return
    modal.classList.remove('active')
    overlay.classList.remove('active')
}


//PREVIEW IMAGE

const importFile = document.getElementById("import_file")
const previewImg = document.querySelector(".image_preview_image")

const trashDelete = document.getElementById("trash")

const importProfilPicture = document.getElementById("import_pp")
const previewImgPP = document.querySelector(".pp_preview_pp")



trashDelete.addEventListener("click", () =>{
    previewImg.setAttribute("src", "")
})

importFile.addEventListener("change", function (){
    const file = (this.files[0])

    if(file){
        const reader = new FileReader()

        previewImg.style.display = "block"

        reader.addEventListener("load", function (){
            previewImg.setAttribute("src", this.result)
        })

        reader.readAsDataURL(file)
    } else {
        previewImg.style.display = null
        previewImg.setAttribute("src", "")
    }
})

importProfilPicture.addEventListener("change", function (){
    const file = (this.files[0])

    if(file){
        const reader = new FileReader()

        previewImgPP.style.display = "block"

        reader.addEventListener("load", function (){
            previewImgPP.setAttribute("src", this.result)
        })

        reader.readAsDataURL(file)
    } else {
        previewImgPP.style.display = null
        previewImgPP.setAttribute("src", "")
    }
})


