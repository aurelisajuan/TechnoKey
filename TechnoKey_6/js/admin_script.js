// Model
class AdminModel {
    constructor() {
        this.navbarActive = false;
        this.profileActive = false;
    }

    toggleNavbar() {
        this.navbarActive = !this.navbarActive;
        this.profileActive = false;
    }

    toggleProfile() {
        this.profileActive = !this.profileActive;
        this.navbarActive = false;
    }

    reset() {
        this.navbarActive = false;
        this.profileActive = false;
    }
}

// View
class AdminView {
    constructor() {
        this.navbar = document.querySelector('.header .flex .navbar');
        this.profile = document.querySelector('.header .flex .profile');
    }

    updateNavbar(active) {
        if (active) {
            this.navbar.classList.add('active');
        } else {
            this.navbar.classList.remove('active');
        }
    }

    updateProfile(active) {
        if (active) {
            this.profile.classList.add('active');
        } else {
            this.profile.classList.remove('active');
        }
    }

    reset() {
        this.navbar.classList.remove('active');
        this.profile.classList.remove('active');
    }
}

// Controller
class AdminController {
    constructor(model, view) {
        this.model = model;
        this.view = view;

        document.querySelector('#menu-btn').onclick = () => this.toggleNavbar();
        document.querySelector('#user-btn').onclick = () => this.toggleProfile();
        window.onscroll = () => this.reset();
    }

    toggleNavbar() {
        this.model.toggleNavbar();
        this.view.updateNavbar(this.model.navbarActive);
        this.view.updateProfile(this.model.profileActive);
    }

    toggleProfile() {
        this.model.toggleProfile();
        this.view.updateNavbar(this.model.navbarActive);
        this.view.updateProfile(this.model.profileActive);
    }

    reset() {
        this.model.reset();
        this.view.reset();
    }
}

// Main Entry Point
document.addEventListener('DOMContentLoaded', () => {
    const adminModel = new AdminModel();
    const adminView = new AdminView();
    const adminController = new AdminController(adminModel, adminView);
});
