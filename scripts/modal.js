const listaArtistas = document.getElementById('modal-list');
const artistasDetalhes = document.getElementById('modal-details');
const closeButton = document.getElementById('close-button'); 
const artistas = [
    // 1 Linha
    {
        nome: "Rafael",
        descricao: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis metus ex. Phasellus euismod lacus scelerisque tincidunt porttitor.",
        img: "https://placehold.co/150",
        display: "artista-img"
    },
    {
        nome: "",
        descricao: "",
        img: "",
        display: "none"
    },
    {
        nome: "Eduardo",
        descricao: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis metus ex. Phasellus euismod lacus scelerisque tincidunt porttitor. Praesent ut nibh tincidunt, dictum nibh sed, scelerisque mi. Cras blandit molestie mi, ut tincidunt velit elementum ac. Proin pharetra vel quam eget lacinia. Nunc vitae turpis eget dui venenatis euismod. Ut nec placerat lectus, in tincidunt nisi. Curabitur quis semper felis. Nulla at leo vel velit mattis dictum. Donec risus est, commodo eget bibendum rutrum, sodales ac sapien.",
        img: "https://placehold.co/150",
        display: "artista-img"
    },
    {
        nome: "Marcos",
        descricao: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis metus ex. Phasellus euismod lacus scelerisque tincidunt porttitor. Praesent ut nibh tincidunt, dictum nibh sed, scelerisque mi. Cras blandit molestie mi, ut tincidunt velit elementum ac. Proin pharetra vel quam eget lacinia. Nunc vitae turpis eget dui venenatis euismod. Ut nec placerat lectus, in tincidunt nisi. Curabitur quis semper felis. Nulla at leo vel velit mattis dictum. Donec risus est, commodo eget bibendum rutrum, sodales ac sapien.",
        img: "https://placehold.co/150",
        display: "artista-img"
    },
    // 2 Linha
    {
        nome: "",
        descricao: "",
        img: "",
        display: "none"
    },
    {
        nome: "Eduardo",
        descricao: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis metus ex. Phasellus euismod lacus scelerisque tincidunt porttitor. Praesent ut nibh tincidunt, dictum nibh sed, scelerisque mi. Cras blandit molestie mi, ut tincidunt velit elementum ac. Proin pharetra vel quam eget lacinia. Nunc vitae turpis eget dui venenatis euismod. Ut nec placerat lectus, in tincidunt nisi. Curabitur quis semper felis. Nulla at leo vel velit mattis dictum. Donec risus est, commodo eget bibendum rutrum, sodales ac sapien.",
        img: "https://placehold.co/150",
        display: "artista-img"
    },
    {
        nome: "",
        descricao: "",
        img: "",
        display: "none"
    },
    {
        nome: "Marcos",
        descricao: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis metus ex. Phasellus euismod lacus scelerisque tincidunt porttitor. Praesent ut nibh tincidunt, dictum nibh sed, scelerisque mi. Cras blandit molestie mi, ut tincidunt velit elementum ac. Proin pharetra vel quam eget lacinia. Nunc vitae turpis eget dui venenatis euismod. Ut nec placerat lectus, in tincidunt nisi. Curabitur quis semper felis. Nulla at leo vel velit mattis dictum. Donec risus est, commodo eget bibendum rutrum, sodales ac sapien.",
        img: "https://placehold.co/150",
        display: "artista-img"
    },
    // 3 Linha 
    {
        nome: "",
        descricao: "",
        img: "",
        display: "none"
    },
    {
        nome: "Marcos",
        descricao: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis metus ex. Phasellus euismod lacus scelerisque tincidunt porttitor. Praesent ut nibh tincidunt, dictum nibh sed, scelerisque mi. Cras blandit molestie mi, ut tincidunt velit elementum ac. Proin pharetra vel quam eget lacinia. Nunc vitae turpis eget dui venenatis euismod. Ut nec placerat lectus, in tincidunt nisi. Curabitur quis semper felis. Nulla at leo vel velit mattis dictum. Donec risus est, commodo eget bibendum rutrum, sodales ac sapien.",
        img: "https://placehold.co/150",
        display: "artista-img"
    },
    {
        nome: "Marcos",
        descricao: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis metus ex. Phasellus euismod lacus scelerisque tincidunt porttitor. Praesent ut nibh tincidunt, dictum nibh sed, scelerisque mi. Cras blandit molestie mi, ut tincidunt velit elementum ac. Proin pharetra vel quam eget lacinia. Nunc vitae turpis eget dui venenatis euismod. Ut nec placerat lectus, in tincidunt nisi. Curabitur quis semper felis. Nulla at leo vel velit mattis dictum. Donec risus est, commodo eget bibendum rutrum, sodales ac sapien.",
        img: "https://placehold.co/150",
        display: "artista-img"
    },
    {
        nome: "",
        descricao: "",
        img: "",
        display: "none"
    },
]


function closeModal() {
    artistasDetalhes.style.display = "none"
    document.body.setAttribute('style', 'overflow-y: auto');
}


artistasDetalhes.addEventListener('click', (e) => {
    
    if (e.target === artistasDetalhes) {
        closeModal();
    }
})



function detalhesArtista(artista) {
    artistasDetalhes.style.display = "flex"

    artistasDetalhes.innerHTML = `
        <div class="modal-item">
			<img class="close-button" id="close-button" onclick="closeModal()" src="./img/x.svg" alt="">
			<div class="modal-artista-images">
                <img src="${artista.img}" alt="">
                <img src="${artista.img}" alt="">
            </div>
			<div class="modal-item-informacoes">
				<h3>${artista.nome}</h1>
				<p>${artista.descricao}</p>
			</div>
		</div>
    `
}



artistas.map((artistas) => {
    let imgArtista = document.createElement('img');
    imgArtista.setAttribute('src', artistas.img);
    imgArtista.setAttribute('class', artistas.display);
    listaArtistas.appendChild(imgArtista);
    if (artistas.display !== 'none') {
        imgArtista.addEventListener('click', (e) => {
            document.body.setAttribute('style', 'overflow-y: hidden');
            e.preventDefault();
            detalhesArtista(artistas)
        })
    }
}
)
