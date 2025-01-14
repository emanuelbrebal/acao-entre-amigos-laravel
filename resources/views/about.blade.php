@extends('layouts.app')
@section('title', 'Ação Entre Amigos - About Page')

@section('content')

    <div class="sobre">
        <a href="javascript:void(0)" onclick="history.back()" class="btn -voltar"> <svg class="btn" xmlns="http://www.w3.org/2000/svg"
            width="20" height="20" viewBox="0 0 24 24">
            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                <path d="M21 12h-17.5" />
                <path d="M3 12l7 7M3 12l7 -7" />
            </g>
        </svg>
        voltar</a>
        <div class="main-sobre -br">
            <h1 class="h1-sobre">Sobre o projeto: Ação Entre Amigos <svg class="svg-sobre" xmlns="http://www.w3.org/2000/svg" width="36" height="36"
                    viewBox="0 0 36 36">
                    <path fill="#009b3a" d="M36 27a4 4 0 0 1-4 4H4a4 4 0 0 1-4-4V9a4 4 0 0 1 4-4h28a4 4 0 0 1 4 4z" />
                    <path fill="#fedf01" d="M32.728 18L18 29.124L3.272 18L18 6.875z" />
                    <circle cx="17.976" cy="17.924" r="6.458" fill="#002776" />
                    <path fill="#cbe9d4"
                        d="M12.277 14.887a6.4 6.4 0 0 0-.672 2.023c3.995-.29 9.417 1.891 11.744 4.595c.402-.604.7-1.28.883-2.004c-2.872-2.808-7.917-4.63-11.955-4.614" />
                    <path fill="#88c9f9" d="M12 18.233h1v1h-1zm1 2h1v1h-1z" />
                    <path fill="#55acee" d="M15 18.233h1v1h-1zm2 1h1v1h-1zm4 2h1v1h-1zm-3 1h1v1h-1zm3-6h1v1h-1z" />
                    <path fill="#3b88c3" d="M19 20.233h1v1h-1z" />
                </svg></h1>
            <p>Olá, sou <strong>Emanuel Victor de Melo Brebal</strong>, idealizador e desenvolvedor deste projeto que você
                está
                conferindo agora!</p>
            <p>Este projeto foi desenvolvido utilizando o framework Laravel e a poderosa tríade da web: HTML5, CSS3 e
                JavaScript, com integração ao PHP e ao PostgreSQL para garantir funcionalidade e performance.</p>
            <p>Embora tenha sido criado com objetivos de estudo e para compor meu portfólio, o resultado reflete um nível
                bastante profissional, concorda?</p>
            <p>Se você precisa de soluções com essa mesma qualidade, estou aqui para ajudá-lo! Entre em contato e vamos
                trocar
                ideias sobre como posso contribuir para o seu projeto.</p>
            <p>Meus contatos estão logo abaixo. Será um prazer conversar com você!</p>
            <a href="https://github.com/emanuelbrebal" class="footer-link" target="_blank">github</a>
            <a href="https://github.com/emanuelbrebal/acao-entre-amigos-laravel" class="footer-link" target="_blank">github do projeto</a>
            <a href="https://www.linkedin.com/in/emanuel-victor-brebal/" class="footer-link" target="_blank">linkedin</a>
            <a href="mailto:manu.brebal@gmail.com?subject=Interesse no seu projeto&body=Olá%20Emanuel,%0A%0AEspero%20que%20este%20e-mail%20o%20encontre%20bem.%0A%0AConheci%20seu%20projeto%20e%20fiquei%20muito%20interessado(a)!%20Gostaria%20de%20marcar%20uma%20entrevista%20ou%20reunião%20para%20conversarmos%20melhor.%0A%0AAguardo%20sua%20resposta.%0A%0AAtenciosamente,%0A[Seu Nome]"
                class="footer-link -email" target="_blank">Enviar E-mail</a>
        </div>

        <div class="main-sobre -en">
            <h1 class="h1-sobre">About the Project: Ação Entre Amigos <svg class="svg-sobre" xmlns="http://www.w3.org/2000/svg" width="36" height="36"
                    viewBox="0 0 36 36">
                    <path fill="#b22334"
                        d="M35.445 7C34.752 5.809 33.477 5 32 5H18v2zM0 25h36v2H0zm18-8h18v2H18zm0-4h18v2H18zM0 21h36v2H0zm4 10h28c1.477 0 2.752-.809 3.445-2H.555c.693 1.191 1.968 2 3.445 2M18 9h18v2H18z" />
                    <path fill="#eee"
                        d="M.068 27.679q.025.14.059.277q.04.15.092.296c.089.259.197.509.333.743L.555 29h34.89l.002-.004a4 4 0 0 0 .332-.741a4 4 0 0 0 .152-.576c.041-.22.069-.446.069-.679H0c0 .233.028.458.068.679M0 23h36v2H0zm0-4v2h36v-2H18zm18-4h18v2H18zm0-4h18v2H18zM.555 7l-.003.005zM.128 8.044c.025-.102.06-.199.092-.297a4 4 0 0 0-.092.297M18 9h18c0-.233-.028-.459-.069-.68a3.6 3.6 0 0 0-.153-.576A4 4 0 0 0 35.445 7H18z" />
                    <path fill="#3c3b6e" d="M18 5H4a4 4 0 0 0-4 4v10h18z" />
                    <path fill="#fff"
                        d="m2.001 7.726l.618.449l-.236.725L3 8.452l.618.448l-.236-.725L4 7.726h-.764L3 7l-.235.726zm2 2l.618.449l-.236.725l.617-.448l.618.448l-.236-.725L6 9.726h-.764L5 9l-.235.726zm4 0l.618.449l-.236.725l.617-.448l.618.448l-.236-.725l.618-.449h-.764L9 9l-.235.726zm4 0l.618.449l-.236.725l.617-.448l.618.448l-.236-.725l.618-.449h-.764L13 9l-.235.726zm-8 4l.618.449l-.236.725l.617-.448l.618.448l-.236-.725l.618-.449h-.764L5 13l-.235.726zm4 0l.618.449l-.236.725l.617-.448l.618.448l-.236-.725l.618-.449h-.764L9 13l-.235.726zm4 0l.618.449l-.236.725l.617-.448l.618.448l-.236-.725l.618-.449h-.764L13 13l-.235.726zm-6-6l.618.449l-.236.725L7 8.452l.618.448l-.236-.725L8 7.726h-.764L7 7l-.235.726zm4 0l.618.449l-.236.725l.617-.448l.618.448l-.236-.725l.618-.449h-.764L11 7l-.235.726zm4 0l.618.449l-.236.725l.617-.448l.618.448l-.236-.725l.618-.449h-.764L15 7l-.235.726zm-12 4l.618.449l-.236.725l.617-.448l.618.448l-.236-.725l.618-.449h-.764L3 11l-.235.726zM6.383 12.9L7 12.452l.618.448l-.236-.725l.618-.449h-.764L7 11l-.235.726h-.764l.618.449zm3.618-1.174l.618.449l-.236.725l.617-.448l.618.448l-.236-.725l.618-.449h-.764L11 11l-.235.726zm4 0l.618.449l-.236.725l.617-.448l.618.448l-.236-.725l.618-.449h-.764L15 11l-.235.726zm-12 4l.618.449l-.236.725l.617-.448l.618.448l-.236-.725l.618-.449h-.764L3 15l-.235.726zM6.383 16.9L7 16.452l.618.448l-.236-.725l.618-.449h-.764L7 15l-.235.726h-.764l.618.449zm3.618-1.174l.618.449l-.236.725l.617-.448l.618.448l-.236-.725l.618-.449h-.764L11 15l-.235.726zm4 0l.618.449l-.236.725l.617-.448l.618.448l-.236-.725l.618-.449h-.764L15 15l-.235.726z" />
                </svg></h1>
            <p>Hello, I’m <strong>Emanuel Victor de Melo Brebal</strong>, the creator and developer of this project you’re
                exploring right now!</p>
            <p>This project was developed using the Laravel framework along with the powerful web trio: HTML5, CSS3, and
                JavaScript, seamlessly integrated with PHP and PostgreSQL to ensure functionality and performance.</p>
            <p>Although it was initially created for learning purposes and to enrich my portfolio, the result reflects a
                highly
                professional level, doesn’t it?</p>
            <p>If you’re looking for solutions with this same level of quality, I’m here to help! Get in touch, and let’s
                discuss how I can contribute to your project.</p>
            <p>You’ll find my contact details below. I’d love to connect with you!
            </p>
            <a href="https://github.com/emanuelbrebal" class="footer-link">github</a>
            <a href="https://github.com/emanuelbrebal/acao-entre-amigos-laravel" class="footer-link" target="_blank">Project's Github</a>
            <a href="https://www.linkedin.com/in/emanuel-victor-brebal/" class="footer-link">linkedin</a>
            <a href="mailto:manu.brebal@gmail.com?subject=Interest in your project&body=Hello%20Emanuel,%0A%0AI%20hope%20this%20email%20finds%20you%20well.%0A%0AI%20came%20across%20your%20project%20and%20was%20very%20impressed!%20I%20would%20love%20to%20schedule%20an%20interview%20or%20meeting%20to%20discuss%20further.%0A%0ALooking%20forward%20to%20hearing%20from%20you.%0A%0ABest%20regards,%0A[Your Name]"
                class="footer-link -email">Send Email</a>

        </div>
    </div>
@endsection
