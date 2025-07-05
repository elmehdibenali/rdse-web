<x-layout title="Home">

    <x-header/>

          <!--==================== MAIN ====================-->
      <main class="main">
         <!--==================== HOME ====================-->
         <section class="home section" id="home">

            <div class="home__container container grid">
                <div class="home__content grid">
                    <div class="home__data">
                        <h1 class="home__title">
                            Votre Partenaire en Ingénierie <br>
                             Électrique et Automatisme Industriel
                        </h1>
                        <p class="home__description">
                            Des solutions électriques innovantes pour un avenir énergétiquement efficace et durable.
                        </p>

                        <div class="home__buttons">
                            <a href="#services" class="button">Nos Services</a>
                            <a href="#projects" class="button__link">
                                <span>Nos réalisations</span>
                                <i class="ri-arrow-right-line"></i>
                            </a>
                        </div>
                    </div>
                    <div class="home__info">
                        <div>
                            <h3 class="home__info-title">10+</h3>
                            <p class="home__info-description">Années d' <br> Experience</p>
                        </div>
                        <div>
                            <h3 class="home__info-title">100</h3>
                            <p class="home__info-description">Projets <br> Réalisé </p>
                        </div>
                    </div>
                </div>
                <div class="home__images">
                    <img src="{{asset('img/hero-img.jpeg')}}" alt="image" class="home__img-1">

                </div>
            </div>
         </section>

         <!--==================== ABOUT ====================-->
         <section class="about section" id="about">
            <div class="about__container container grid">
                <div class="about__data">
                    <span class="section__subtitle">À PROPOS DE NOUS</span>
                    <h2 class="section__title">
                        Nous offrons les meilleurs services pour construire vos solutions électriques sur mesure
                    </h2>

                    <p class="about__description">
                      Experts en ingénierie électrique et automatismes industriels,
                      nous réalisons des solutions sur mesure, innovantes,
                      fiables et efficaces.
                    </p>

                    <ul class="about__list grid">
                        <li class="about__list-item">
                            <i class="ri-checkbox-circle-line"></i>
                            <span>Équipe professionnelle qualifiée</span>
                        </li>
                        <li class="about__list-item">
                            <i class="ri-checkbox-circle-line"></i>
                            <span>Qualité garantie sur tous nos services</span>
                        </li>
                        <li class="about__list-item">
                            <i class="ri-checkbox-circle-line"></i>
                            <span>Solide expérience dans le secteur énergétique</span>
                        </li>
                        <li class="about__list-item">
                            <i class="ri-checkbox-circle-line"></i>
                            <span>Devis clair et personnalisé pour votre projet</span>
                        </li>

                    </ul>

                    <a href="#projects" class="button__sec">Voir nos projets</a>

                </div>
                <div class="about__images">
                        <img src="{{asset('img/about-img.jpg')}}" alt="image" class="about__img">
                </div>
            </div>
         </section>

         <!--==================== SERVICES ====================-->
         <section class="services section" id="services">
            <div class="services__container container grid">
                <div class="services__data">
                    <div>
                        <span class="section__subtitle service__subtitle">NOS SERVICES</span>
                        <h2 class="section__title">Services Électriques de Haute Qualité</h2>
                    </div>

                    <p class="services__description">
                        Nous proposons des services électriques fiables,
                        innovants et parfaitement adaptés à vos besoins.
                    </p>
                    <a href="#contact" class="button">Contactez-Nous</a>
                </div>
                <div class="services__swiper swiper">
                    <div class="swiper-wrapper">

                        @foreach ($services as $service)
                            <article class="services__card swiper-slide">
                                <div class="services__icon">
                                    <i class="{{ $service->icon }}"></i>
                                </div>

                                <h3 class="services__title">{{ $service->name }}</h3>

                                <p>{{ $service->description }}</p>
                            </article>
                        @endforeach
                    </div>
                </div>


                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>



         </section>

         <!--==================== PROJECTS ====================-->
         <section class="projects section" id="projects">
            <span class="section__subtitle">NOS PROJECTS</span>
            <h2 class="section__title">Dernier Projet Réalisé</h2>

            <div class="projects__container container grid">
                <article class="projects__card">
                    <img src="{{asset('img/first-project.jpg')}}" alt="image" class="projects__img">

                    <div class="projects__data">

                        <h2 class="projects__title">Projet d'automatisation de la station de traitement des eaux </h2>
                        <span class="projects__date">January 15, 2023</span>

                        <p>
                            Automatisation complète de la chaîne de traitement
                            avec supervision SCADA et intégration de
                            variateurs de vitesse pour une meilleure efficacité énergétique.
                        </p>
                    </div>
                </article>
                <article class="projects__card">
                    <img src="{{asset('img/second-projects.jpeg')}}" alt="image" class="projects__img">

                    <div class="projects__data">

                        <h2 class="projects__title">Installation électrique industrielle – Centrale solaire Noor Ouarzazate</h2>
                        <span class="projects__date">October 8, 2022</span>

                        <p>
                             Conception et mise en place des systèmes de contrôle-commande
                                pour les unités de conversion et distribution d’énergie.
                        </p>
                    </div>
                </article>
                <article class="projects__card">
                    <img src="{{asset('img/Third-project.jpeg')}}" alt="image" class="projects__img">

                    <div class="projects__data">

                        <h2 class="projects__title">Modernisation de lignes de production – Centrale Danone à El Jadida</h2>
                        <span class="projects__date">June 21, 2023</span>

                        <p>
                              Intégration d’automates programmables PLC et capteurs intelligents
                                pour l’optimisation de la production industrielle.
                        </p>
                    </div>
                </article>

            </div>
         </section>

         <!--==================== CONTACT ====================-->

         <section class="contact section" id="contact">
             <div class="container">
                 <span class="section__subtitle">CONTACTEZ-NOUS</span>
                <h2 class="section__title">Reserver Une Consultation En-Ligne</h2>

                <div class="contact__container grid">
                    <img src="{{asset('img/contact.jpg')}}" alt="image" class="contact__image">

                    <form action="{{route('user.consultation.store')}}" class="contact__input grid" method="post">

                        @method('POST')
                        @csrf
                            <h2 class="section-title">Informations sur la consultation</h2>
                            <p class="section-description">
                              Cette consultation est l'occasion de faire un point clair sur votre situation. Ensemble, nous identifierons votre problématique, vos besoins spécifiques et les objectifs à atteindre.
                              Une fois votre service sélectionné, l’administrateur vous proposera un créneau. Après votre confirmation, le lien de consultation vous sera transmis.
                            </p>

                            <div class="contact__box">
                            <label for="service_id" class="contact__label">Service demandé</label>
                            <select id="service_id" name="service_id" class="contact__form">
                                <option value="">-- Choisir un service --</option>
                                @foreach ($services as $service )
                                <option value="{{$service->id}}">{{$service->name}}</option>
                                @endforeach
                            </select>
                            </div>

                            <button type="submit" class="button__sec">Réserver La Consultation</button>
                    </form>

                </div>
            </div>

         </section>

        </main>

        <!--==================== FOOTER ====================-->
        <footer class="footer">
            <div class="footer__container container grid">
                <div>
                    <a href="" class="footer__logo">
                        {{-- <span>RDSE</span> --}}
                         {{-- <img src="{{asset('img/rdseLogo.png')}}" alt="image"> --}}
                <img src="{{asset('img/rdse-white-logo.png')}}" alt="RDSE Logo" class="logo__white">

                    </a>

                    <p class="footer__description">
                        Votre Partenaire en Ingénierie
                        Électrique et Automatisme Industriel
                    </p>
                    <address class="footer__email">Email: rdse@rdse.ma</address>
                </div>
                <div class="footer__content grid">
                    <div>
                        <h3 class="footer__title">Entreprise</h3>

                        <ul class="footer__links">
                            <li>
                                <a href="#about" class="footer__link">À Propos De Nous</a>
                            </li>
                            <li>
                                <a href="#services" class="footer__link">Serivices</a>
                            </li>
                            <li>
                                <a href="#projects" class="footer__link">Projects</a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="footer__title">Information</h3>

                        <ul class="footer__list">
                            <li>
                                <address class="footer__info">76 Rue Des Oudayas La  Villette  - Casablanca</address>
                            </li>
                            <li>
                                <address class="footer__info">9AM - 11PM</address>
                            </li>

                        </ul>
                    </div>

                    <div>
                        <h3 class="footer__title">Social Media</h3>

                        <div class="footer__social">
                            <a href="#" target="_blank" class="footer__social-link">
                                <i class="ri-facebook-circle-line"></i>
                            </a>

                            <a href="#" target="_blank" class="footer__social-link">
                                <i class="ri-instagram-line"></i>
                            </a>

                            <a href="#" target="_blank" class="footer__social-link">
                                <i class="ri-twitter-x-line"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </footer>

</x-layout>
