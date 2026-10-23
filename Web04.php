<?php
require_once "koneksi.php";

$sql = "SELECT * FROM about_sections";
$result = $conn->query($sql);

$sqlSales = "SELECT month, total_sales FROM sales_data ORDER BY id ASC";
$resultSales = $conn->query($sqlSales);

$months = [];
$sales = [];

if ($resultSales) {
    while ($rowSales = $resultSales->fetch_assoc()) {
        $months[] = $rowSales['month'];
        $sales[] = (int) $rowSales['total_sales'];
    }
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seoraé Bakery</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Web04.css?v=2">
</head>
<body>


<?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
<div id="successPopup" class="popup-overlay">
    <div class="popup-box">
        <div class="popup-check">
            <svg viewBox="0 0 24 24" width="42" height="42"
                 fill="none" stroke="currentColor"
                 stroke-width="2.5" stroke-linecap="round"
                 stroke-linejoin="round">
                <path d="M5 12l4 4L19 6"/>
            </svg>
        </div>

        <p class="popup-brand">SEORAÉ BAKERY ♡</p>

        <h2>Your Sweet Message Has Arrived!</h2>

        <p class="popup-message">
            Your little note has found its way to us.
            Thank you for sharing a sweet moment
            with Seoraé Bakery.
        </p>

        
        <button type="button" onclick="document.getElementById('successPopup').remove(); window.history.replaceState(null, '', 'Web04.php#contact');">
            Sweet, Thank You ♡
        </button>

    </div>
</div>
<?php endif; ?>



<nav class="navbar navbar-expand-lg navbar-custom sticky-top">
    <div class="container">
        <a class="navbar-brand" href="#home">
            <div class="logo-circle">
                <img src="img/logo-cake.png" alt="Logo">
            </div>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<section id="home" class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <p class="small-title">Bakery House</p>
                <h1>Seoraé Bakehouse</h1>
                <p class="hero-description">
                    Sweet little things, baked just for you. ♡
                    <br>From our oven to your heart — Seoraé Bakery.
                </p>
                <a href="#contact" class="btn btn-dark rounded-pill px-4">Sweet Order</a>
            </div>

            <div class="col-lg-6 text-center">
                <div class="hero-image-wrapper">
                    <img src="img/logo-cake.png" alt="Profile" class="hero-image">
                </div>
            </div>
        </div>
    </div>
</section>

<section id="services" class="services-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2>Our Product</h2>
            <p class="section-description">Baked softly, loved deeply.</p>
        </div>

        <div class="row" id="productCategories">
            <div class="col-md-4 mb-4">
                <div class="service-card" onclick="showProducts('cake')" role="button" tabindex="0" onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();showProducts('cake')}">
                    <div class="service-icon">˚₊‧🍰‧₊˚</div>
                    <h3>Cake</h3>
                    <p>Soft, sweet, and made with a little sprinkle of love.</p>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="service-card" onclick="showProducts('pastry')" role="button" tabindex="0" onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();showProducts('pastry')}">
                    <div class="service-icon">˚₊‧🥐‧₊˚</div>
                    <h3>Pastry</h3>
                    <p>Buttery, flaky, and baked to make your day a little sweeter.</p>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="service-card" onclick="showProducts('donut')" role="button" tabindex="0" onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();showProducts('donut')}">
                    <div class="service-icon">˚₊‧🍩‧₊˚</div>
                    <h3>Donut</h3>
                    <p>Soft, fluffy, and sweet with a little sprinkle of happiness.</p>
                </div>
            </div>
        </div>

        <div id="productMenu" class="product-menu" hidden>
            <div class="product-menu-header">
                <div>
                    <p class="product-eyebrow">MADE WITH LOVE</p>
                    <h3 id="productMenuTitle">Our Cake Collection</h3>
                    <p id="productMenuDescription">A little sweetness for your day.</p>
                </div>
                <button type="button" class="product-back" onclick="hideProducts()">← Back</button>
            </div>
            <div class="row" id="productList"></div>
        </div>
    </div>
</section>


<section id="about" class="about-section">
    <div class="container">
        <h2 class="text-center">About Us</h2>

        <div class="row align-items-start about-content">
            <div class="col-md-5">
                <div class="about-image-box">
                    <img src="img/seorae-bakery.png" alt="Seoraé Bakery">
                </div>
            </div>

            <div class="col-md-7">
                <p>
                    Seoraé Bakery hadir sebagai ruang kecil yang
                    menyajikan berbagai hidangan manis dengan rasa,
                    tampilan, dan suasana yang dibuat untuk
                    menciptakan momen istimewa.
                </p>

                <div class="row">
                    <?php
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                        <div class="col-md-6">
                            <h3>
                                <?php echo htmlspecialchars($row['title']); ?>
                            </h3>
                            <p>
                                <?php echo htmlspecialchars($row['description']); ?>
                            </p>
                        </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <div class="text-center mb-4">
                    <p>OUR PERFORMANCE</p>
                    <h3>Our Monthly Sales</h3>
                    <p>Number of products sold each week in a month</p>
                </div>

                <div class="chart-container">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="contact" class="contact-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2>Place Your Order</h2>
        </div>

        <div class="row align-items-center mt-5">
            <div class="col-lg-5 mb-4">
                <h2>
                    Made for your
                    <br>sweetest<br>
                    <span>moments.</span>
                </h2>

                <div class="contact-info">
                    <p>hello@seoraebakery.com</p>
                    <p>Jakarta, Indonesia</p>
                </div>
            </div>

            <div class="col-lg-7">
                <form class="contact-form" action="simpan_pesan.php" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Name" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <input type="tel" name="contact" class="form-control" placeholder="Contact" required>
                        </div>

                        <div class="col-12 mb-3">
                            <textarea name="message" class="form-control" rows="5" placeholder="Tell us your cravings..." required></textarea>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary px-5">Kirim Pesan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h4>Seoraé Bakery</h4>
                <p>Where Elegance Meets Sweetness</p>
            </div>

            <div class="col-md-6 text-md-right">
                <p class="footer-contact">
                    +62-813-1206-6805
                    <br>@seorae.bakery
                </p>
            </div>
        </div>

        <hr>
        <p class="text-center mb-0">© 2026 Seoraé Bakery</p>
    </div>
</footer>

<script src="js/jquery-3.5.1.slim.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/chart.js"></script>

<script>

const menuLinks = document.querySelectorAll(".nav-link");
const sections = document.querySelectorAll("section[id]");

function updateActiveMenu() {
    let currentSection = "home";

    sections.forEach(function(section) {
        const sectionTop = section.offsetTop - 150;

        if (window.scrollY >= sectionTop) {
            currentSection = section.getAttribute("id");
        }
    });

    menuLinks.forEach(function(link) {
        link.classList.remove("active");

        if (link.getAttribute("href") === "#" + currentSection) {
            link.classList.add("active");
        }
    });
}

window.addEventListener("scroll", updateActiveMenu);
window.addEventListener("load", updateActiveMenu);

menuLinks.forEach(function(link) {
    link.addEventListener("click", function() {
        menuLinks.forEach(function(menu) {
            menu.classList.remove("active");
        });

        this.classList.add("active");
    });
});

const productData = {
    cake: {
        title: "Our Cake Collection",
        description: "Sweet little cakes for your special moments.",
        products: [
            {
                name: "Strawberry Cake",
                description: "$65",
                image: "img/strawberrycake.jpg"
            },
            {
                name: "Chocolate Cake",
                description: "$65",
                image: "img/chococake.jpg"
            },
            {
                name: "Vanilla Cake",
                description: "$55",
                image: "img/vanillacake.jpg"
            }
        ]
    },

    pastry: {
        title: "Our Pastry Collection",
        description: "Buttery pastries, freshly baked with love.",
        products: [
            {
                name: "Croissant",
                description: "$5",
                image: "img/croissant.jpg"
            },
            {
                name: "Cinnamon Roll",
                description: "$6",
                image: "img/cinnamon-roll.jpg"
            },
            {
                name: "Danish Pastry",
                description: "$6.5",
                image: "img/danish-pastry.jpg"
            }
        ]
    },

    donut: {
        title: "Our Donut Collection",
        description: "Soft, fluffy donuts with delightful toppings.",
        products: [
            {
                name: "Glazed Donut",
                description: "$4.5",
                image: "img/glazed-donut.jpg"
            },
            {
                name: "Bomboloni",
                description: "$6",
                image: "img/bomboloni.jpg"
            },
            {
                name: "Cruller Donut",
                description: "$5.5",
                image: "img/cruller.jpg"
            }
        ]
    }
};

function showProducts(category) {
    const data = productData[category];

    if (!data) return;

    document.getElementById("productMenuTitle").textContent = data.title;
    document.getElementById("productMenuDescription").textContent = data.description;

    document.getElementById("productList").innerHTML = data.products.map(function(product) {
        return `
            <div class="col-md-4 mb-4">
                <div class="menu-product-card">
                    <img src="${product.image}" alt="${product.name}" loading="lazy">
                    <div class="menu-product-info">
                        <h4>${product.name}</h4>
                        <p>${product.description}</p>
                    </div>
                </div>
            </div>
        `;
    }).join("");

    document.getElementById("productCategories").hidden = true;
    document.getElementById("productMenu").hidden = false;
}

function hideProducts() {
    document.getElementById("productMenu").hidden = true;
    document.getElementById("productCategories").hidden = false;
}

const salesCanvas = document.getElementById("salesChart");

if (salesCanvas && typeof Chart !== "undefined") {
    new Chart(salesCanvas, {
        type: "line",
        data: {
            labels: <?php echo json_encode($months); ?>,
            datasets: [{
                label: "Produk Terjual",
                data: <?php echo json_encode($sales); ?>,
                backgroundColor: "#bd8050",
                borderColor: "#6e491f",
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
} else {
    console.log("Canvas atau Chart.js belum ditemukan.");
}
</script>

</body>
</html>