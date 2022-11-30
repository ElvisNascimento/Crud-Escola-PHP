<?php
declare(strict_types=1);

namespace App\Controller;

class SiteController
{
    public function inicio(): void
    {
        echo "<!doctype html>
        <html lang='en'>
        
        <head>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <meta name='description' content=''>
            <meta name='author' content='Mark Otto, Jacob Thornton, and Bootstrap contributors'>
            <meta name='generator' content='Hugo 0.72.0'>
            <title>Gerenciamento de Escola</title>
        
            <link rel='canonical' href='https://v5.getbootstrap.com/docs/5.0/examples/blog/'>
        
        
        
            <!-- Bootstrap core CSS -->
            <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css'
                integrity='sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I' crossorigin='anonymous'>
            <script src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'
                integrity='sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/'
                crossorigin='anonymous'></script>
            <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'
                integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo'
                crossorigin='anonymous'></script>
        
            <style>
                .bd-placeholder-img {
                    font-size: 1.125rem;
                    text-anchor: middle;
                    -webkit-user-select: none;
                    -moz-user-select: none;
                    -ms-user-select: none;
                    user-select: none;
                }
        
                @media (min-width: 768px) {
                    .bd-placeholder-img-lg {
                        font-size: 3.5rem;
                    }
                }
            </style>
        
        
            <!-- Custom styles for this template -->
            <link href='https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap' rel='stylesheet'>
            <!-- Custom styles for this template -->
            <style>
                /* stylelint-disable selector-list-comma-newline-after */
        
                .blog-header {
                    line-height: 1;
                    border-bottom: 1px solid #e5e5e5;
                }
        
                .blog-header-logo {
                    font-family: 'Playfair Display', Georgia, 'Times New Roman', serif;
                    font-size: 2.25rem;
                }
        
                .blog-header-logo:hover {
                    text-decoration: none;
                }
        
                h1,
                h2,
                h3,
                h4,
                h5,
                h6 {
                    font-family: 'Playfair Display', Georgia, 'Times New Roman', serif;
                }
        
                .display-4 {
                    font-size: 2.5rem;
                }
        
                @media (min-width: 768px) {
                    .display-4 {
                        font-size: 3rem;
                    }
                }
        
                .nav-scroller {
                    position: relative;
                    z-index: 2;
                    height: 2.75rem;
                    overflow-y: hidden;
                }
        
                .nav-scroller .nav {
                    display: flex;
                    flex-wrap: nowrap;
                    padding-bottom: 1rem;
                    margin-top: -1px;
                    overflow-x: auto;
                    text-align: center;
                    white-space: nowrap;
                    -webkit-overflow-scrolling: touch;
                }
        
                .nav-scroller .nav-link {
                    padding-top: .75rem;
                    padding-bottom: .75rem;
                    font-size: .875rem;
                }
        
                .card-img-right {
                    height: 100%;
                    border-radius: 0 3px 3px 0;
                }
        
                .flex-auto {
                    flex: 0 0 auto;
                }
        
                .h-250 {
                    height: 250px;
                }
        
                @media (min-width: 768px) {
                    .h-md-250 {
                        height: 250px;
                    }
                }
        
                /* Pagination */
                .blog-pagination {
                    margin-bottom: 4rem;
                }
        
                .blog-pagination>.btn {
                    border-radius: 2rem;
                }
        
                /*
                * Blog posts
                */
                .blog-post {
                    margin-bottom: 4rem;
                }
        
                .blog-post-title {
                    margin-bottom: .25rem;
                    font-size: 2.5rem;
                }
        
                .blog-post-meta {
                    margin-bottom: 1.25rem;
                    color: #727272;
                }
        
                /*
                * Footer
                */
                .blog-footer {
                    padding: 2.5rem 0;
                    color: #727272;
                    text-align: center;
                    background-color: #f9f9f9;
                    border-top: .05rem solid #e5e5e5;
                }
        
                .blog-footer p:last-child {
                    margin-bottom: 0;
                }
            </style>
        </head>
        
        <body>
        
            <div class='container'>
                <header class='blog-header py-3'>
                    <div class='row flex-nowrap justify-content-between align-items-center'>
                        <div class='col-4 text-center'>
                            <a class='blog-header-logo col align-self-center text-dark' href='#'>Digital College System</a>
                        </div>
                        
                    </div>
                </header>
                <div class='p-4 p-md-5 mb-4 text-white rounded bg-dark'>
                    <div class='col-md-6 px-0'>
                        <h1 class='display-4 font-italic'>Sistema de Gerenciamento de Escola</h1>
                        <p class='lead my-3'>Um sistema desenvlvido em sala para o gerenciamento de uma escola com varios cruds implementados utilizando HTML,CSS,Bootstrap e PHP.</p>
                    </div>
                    <a class='btn btn-secondary' href='/login'>Sign up</a>
                </div>
            </div>
            <footer class='blog-footer'>
                <p>by <a href='https://github.com/ElvisNascimento'>Elvis Nascimento</a></p>
            </footer>
        </body>
        
        </html>";
    }

}