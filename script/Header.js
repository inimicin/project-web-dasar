class Header extends HTMLElement {
  constructor() {
    super();
  }

  connectedCallback() {
    this.innerHTML = `
        <nav
            class="navbar navbar-expand-lg navbar-dark w-100"
            style="background-color: transparent; height: 60px; position: absolute;"
            >
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse mx-3" style="padding-right: 16px;" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link ${this.getAttribute('active') == 'home' ? 'active' : ''}" href="./home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ${this.getAttribute('active') == 'customer_data' ? 'active' : ''}" href="./customer_data.php">Data Customer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ${this.getAttribute('active') == 'produk_data' ? 'active' : ''}" href="./produk_data.php">Data Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ${this.getAttribute('active') == 'penjualan_data' ? 'active' : ''}" href="./penjualan_data.php">Data Penjualan</a>
                    </li>
                </ul>
                <a href="../script/end-session.php" class="d-flex link-underline link-underline-opacity-0"><button type="button" class="btn btn-danger"  style="--bs-btn-padding-y: 5px; --bs-btn-padding-x: 5p; border: none;"><i class="fa-solid fa-right-from-bracket me-2"></i> Logout</button></a>
            </div>
        </nav>

        `;
  }
}

customElements.define("main-header", Header);
