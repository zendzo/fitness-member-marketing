<template>
  <div>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
        <inertia-link class="navbar-brand" href="/dashboard">{{ $page.props.appName }}</inertia-link>
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

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
              <a
                id="navbarDropdown"
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
                v-pre
              >
               Manage
              </a>

              <div
                class="dropdown-menu dropdown-menu-left"
                aria-labelledby="navbarDropdown"
              >
                <inertia-link :href="$route('lead.index')" class="dropdown-item">
                  Lead
                </inertia-link>

              </div>
            </li>
          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            <li class="nav-item dropdown">
              <a
                id="navbarDropdown"
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <span>{{ $page.props.user.name }}</span>
              </a>

              <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdown"
              >
                <a href="#" class="dropdown-item" @click="handleLogout">
                  Logout
                </a>

              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <main class="py-4">
      <slot/>
    </main>
  </div>
</template>

<script>
import axios from "axios"
export default {
  methods: {
    async handleLogout(){
      await axios.post('/logout',{});
      window.location.href = '/';
    }
  }
  
}
</script>