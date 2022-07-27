<template>
    <!--**********************************
                  Top Header
     ***********************************-->
    <div class="g-header-area">

        <div class="container-fluid">
            <div class="g-header-main">
                <div class="g-main-logo">
                    <a href="/">
                        <img src="@/assets/images/logo.svg" alt="ific" class="img-fluid">
                    </a>
                </div>

                <div class="g-top-search">
                    <label for="g-top-search">
                        <input type="search" name="" id="g-top-search" placeholder="Search">
                        <img src="@/assets/images/search.svg" alt="ific">
                    </label>
                </div>

                <div class="g-top-cta">
                    <a href="">
                        <img class="img-fluid" src="@/assets/images/one_click.svg" alt="ific">
                    </a>
                </div>


                <div class="g-admin-login-btn">
                    <a role="button" href="/login" class="btn btn-primary">
                        Admin Login
                    </a>
                </div>
            </div>
        </div>

    </div>
    <!--End Top Header-->


    <!--**********************************
                 Top Navigation
    ***********************************-->
    <div class="g-navigation bg-primary">
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <!-- <li class="nav-item" v-for="item in menus" :key="item.id"><a class="nav-link" href="/deposits">{{item.name}}</a></li> -->
                            <span  v-for="item in menus" :key="item.id">


                                <li class="nav-item dropdown" v-if="item.children!=''">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">{{item.name}}</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <!-- <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a> -->
                                        <router-link  v-for="subitem in item.children" :key="subitem.id" :to="{ name: 'pages', params: { slug: subitem.slug }}" class="dropdown-item" >{{subitem.name}}</router-link>
                                    </div>
                                </li>

                                <li class="nav-item" v-else>
                                    <router-link :to="{ name: 'pages', params: { slug: item.slug }}" class="nav-link" >{{item.name}}</router-link>
                                </li>
                            </span>

                        <!-- <li class="nav-item"><a class="nav-link" href="#">DPS/FDR</a></li>
                        <li class="nav-item"><a class="nav-link">Personal Loan</a></li>
                        <li class="nav-item"><a class="nav-link">SME Loan</a></li>
                        <li class="nav-item"><a class="nav-link">Agri Loan</a></li>
                        <li class="nav-item"><a class="nav-link">Card</a></li>
                        <li class="nav-item"><a class="nav-link">Digital Service</a></li>
                        <li class="nav-item"><a class="nav-link">Other Service</a></li>
                        <li class="nav-item"><a class="nav-link">Fees & Interest</a></li>
                        <li class="nav-item"><a class="nav-link">FAQ</a></li> -->

                        <!-- <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button"
                                                         data-toggle="dropdown" aria-expanded="false">Help
                        </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li> -->
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!--End top Navigation-->
    <!-- Modal -->
    <div class="modal fade" id="g-admin-login" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="g-form-signin">
                        <div class="text-center">

                            <img class="mb-4" src="@/assets/images/logo.svg" alt="" width="72" height="72">
                            <h1 class="h3 mb-3 font-weight-normal">Sign In</h1>
                        </div>
                        <label for="inputEmail" class="">Email address</label>
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
                        <label for="inputPassword" class="">Password</label>
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
                        <div class="checkbox mb-3">
                            <label>
                                <input type="checkbox" value="remember-me"> Remember me
                            </label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




</template>

<script>
export default {
    name: "Header",
    props: {
        menus: {type:Array},
    },
}
</script>

<style scoped lang="scss">
.g-header-area {
    background-color: #ffffff;
}

.g-header-main {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    min-height: calc(10vh + 80px);
    gap: 5rem;
    @media all and (max-width: 1400px){
        gap: 1rem;
    }
}

.g-main-logo {
    flex-basis: 25%;
    @media all and (max-width: 768px) {
        width: 15%;
    }
}

.g-top-cta {
    flex-basis: auto;
    @media all and (max-width: 768px) {
      flex-basis: 25%;
    }
}

.g-admin-login-btn {
    flex-basis: auto;
    margin-left: auto;
    text-align: right;
    @media all and (max-width: 768px) {
        width: 25%;
        flex-grow: 1;
    }
}

.g-top-search {
    flex-basis: 25%;
    flex-grow: 1;
    @media all and (max-width: 768px) {
        width: 15%;
        order:3;
    }

    label {
        display: block;
        width: 100%;
        position: relative;
        margin-bottom: 0;

        input {
            background-color: #E9F2EE;
            border: none;
            padding: 0.7rem 0.7rem 0.7rem 3rem;
            border-radius: 1rem;
            display: block;
            width: 100%;

            &:focus-visible {
                outline: none;
            }
        }

        img {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
        }
    }
}

</style>
