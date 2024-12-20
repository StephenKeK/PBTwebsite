<style>
  /*General Styles*/

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  html {
    font-size: 16px;
    font-family: "Raleway", sans-serif;
    color: #555;
  }

  ul,
  nav {
    list-style: none;
  }

  a {
    text-decoration: none;
    opacity: 0.75;
    color: #fff;
  }

  a:hover {
    opacity: 1;
  }

  a.btn {
    border-radius: 4px;
    text-transform: uppercase;
    font-weight: bold;
    text-align: center;
    background-color: #e07e7b;
    opacity: 1;
    transition: all 400ms;
  }

  a.btn:hover {
    background-color: #ce5856;
  }

  section {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 100px 80px;
  }

  section:not(.hero):nth-child(even) {
    background-color: #f5f5f5;
  }

  .grid {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }

  hr {
    width: 250px;
    height: 3px;
    background-color: #e07e7b;
    border: 0;
    margin-bottom: 50px;
  }

  .image-1 {
    background-image: url("https://images.unsplash.com/photo-1505852903341-fc8d3db10436?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1600&h=900&fit=crop&s=e2f72e62d5f4f04256dd9305d5f51f3c");
  }

  .image-2 {
    background-image: url("https://images.unsplash.com/photo-1475483768296-6163e08872a1?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1600&h=900&fit=crop&s=20b3b1c3caef8c619ac3c75c07a7eafb");
  }

  .image-3 {
    background-image: url("https://images.unsplash.com/photo-1490576198307-6ff97609a0cc?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1600&h=900&fit=crop&s=a0dbd168637edc2cfdac3715ab23d519");
  }

  .image-4 {
    background-image: url("https://images.unsplash.com/photo-1505483531331-fc3cf89fd382?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1600&h=900&fit=crop&s=4f305bbc0243f81f1bf6053a62d76297");
  }

  section h3.title {
    text-transform: capitalize;
    font: bold 48px "Amatic SC", sans-serif;
    margin-bottom: 30px;
    text-align: center;
  }

  section p {
    max-width: 775px;
    line-height: 2;
    padding: 0 20px;
    margin-bottom: 30px;
    text-align: center;
  }

  @media (max-width: 800px) {
    section {
      padding: 50px 20px;
    }
  }

  /*Header Styles*/

  header {
    position: absolute;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 35px 100px 0;
    animation: 1s fadein 0.5s forwards;
    opacity: 0;
    color: #fff;
    z-index: 2;
  }

  @keyframes fadein {
    100% {
      opacity: 1;
    }
  }

  header h2 {
    font-family: "Amatic SC", sans-serif;
  }

  header nav {
    display: flex;
    margin-right: -15px;
  }

  header nav li {
    margin: 0 15px;
  }

  @media (max-width: 800px) {
    header {
      padding: 20px 50px;
      flex-direction: column;
    }

    header h2 {
      margin-bottom: 15px;
    }
  }

  /*Hero Styles*/

  .hero {
    position: relative;
    justify-content: center;
    text-align: center;
    min-height: 100vh;
    color: #fff;
  }

  .hero .background-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url("https://assets.entrepreneur.com/content/3x2/2000/20160105180846-brain-psychological-psychology-thinking-network-smart-education-creative-pointing.jpeg");
    background-size: cover;
    z-index: -1;
    background-color: #80a3db;
  }

  .hero .background-color {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;

    z-index: -1;
    background-color: #2223248e;
  }

  .hero h1 {
    font: 72px "Monospace", sans-serif;
    text-shadow: 2px 2px rgba(0, 0, 0, 0.3);
    margin-bottom: 15px;
    font-weight: 100;
  }

  .hero h3 {
    font: 25px "Raleway", sans-serif;
    font-weight: 300;
    text-shadow: 2px 2px rgba(0, 0, 0, 0.3);
    margin-bottom: 20px;
  }

  .hero h5 {
    font: 19px "Raleway", sans-serif;
    font-weight: 100;
    color: #fefefe;
    margin-bottom: 40px;
  }

  .hero a.btn {
    padding: 20px 46px;
  }

  .hero-content-area {
    opacity: 0;
    margin-top: 100px;
    animation: 1s slidefade 1s forwards;
  }

  @keyframes slidefade {
    100% {
      opacity: 1;
      margin: 0;
    }
  }

  @media (max-width: 800px) {
    .hero {
      min-height: 600px;
    }

    .hero h1 {
      font-size: 48px;
    }

    .hero h3 {
      font-size: 24px;
    }

    .hero a.btn {
      padding: 15px 40px;
    }
  }

  body {
    background-color: #000;
  }

  .blue-btn a {
    color: white;
    text-decoration: none;
    text-align: center;
    display: block; /* important */
  }

  .blue-btn,
  .first-link {
    -webkit-transition: 0.3s;
    -moz-transition: 0.3s;
    -ms-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s;
  }

  .blue-btn {
    height: 64px;
    font: normal normal 700 1em/4em Arial, sans-serif;
    overflow: hidden;
    width: 200px;
    background-color: #ff8e2b;
    border-radius: 20px;
  }

  .blue-btn:hover {
    background-color: #d4874b;
  }

  .blue-btn a:hover {
    text-decoration: none;
  }

  .first-link {
    margin-top: 0em;
  }

  .blue-btn:hover .first-link {
    margin-top: -4em;
  }
  .center-container {
    display: flex;
    justify-content: center;
  }
</style>
<head>
  <link
    href="https://fonts.googleapis.com/css?family=Amatic+SC|Raleway"
    rel="stylesheet"
  />
  <link
    rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
  />
  <link rel="stylesheet" href="assets/css/styles.css" />
</head>
<body>
  <!-- Forked from a template on Tutorialzine: https://tutorialzine.com/2016/06/freebie-landing-page-template-with-flexbox -->

  <section class="hero">
    <div class="background-image"></div>
    <div class="background-color"></div>
    <div class="hero-content-area">
      <h1>Progressive Brain Training</h1>
      <h3>
      Uses increasingly challenging mental exercises to enhance cognitive abilities like memory, focus, and problem-solving skills over time.
      </h3>
      <div class="center-container">
        <div class="blue-btn">
          <a class="first-link" href=""> Get Started </a>
          <a href="login.php"> Login</a>
        </div>
      </div>
    </div>
  </section>
</body>