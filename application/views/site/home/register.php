<section>
    <div id="view">


        <div class="modal-auth modal-inline modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">Đăng ký</h4>
                </div>
                <div class="modal-body">
                    <form accept-charset="UTF-8" action="<?php echo base_url()?>site/user/create" method="post" name="signup">
                        <div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden"
                                                                              value="&#x2713;"/><input
                                name="authenticity_token" type="hidden"
                                value="OqrtQgtHo5HUCnGv0mUTtoB4KKQ26LmXC+AVh5kdpcU="/></div>
                        <div id="signup-name">
                            <div id="signup-first-name" class="form-group">
                                <input class="form-control" name="first_name" placeholder="Tên" size="30"
                                       type="text" value=""/>
                            </div>
                            <div id="signup-last-name" class="form-group">
                                <input class="form-control" name="last_name" placeholder="Họ" size="30"
                                       type="text" value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <input autocapitalize="none" class="form-control" name="email" placeholder="Email"
                                   size="30" type="email"/>
                        </div>
                        <div class="form-group">
                            <div  class="form-group">
                                <input class="form-control" name="user_name" placeholder="Tên đăng nhập" size="30"
                                       type="text" value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="password" placeholder="Mật khẩu" size="30"
                                   type="password"/>

                            <div class="password-meter">
                                <div class="password-meter-bg">
                                    <div class="password-meter-bar"></div>
                                </div>
                                <div class="password-meter-message"></div>
                            </div>
                        </div>
                        <p class="tip">Với việc nhấn vào Đăng Ký, bạn đồng ý với <a href="#"
                                                                                    target="_blank">Điều kiện và
                                điều khoản</a> và <a href="#"_blank>Chính sách bảo mật</a> của
                            trang web.</p>
                        <input class="btn btn-primary btn-lg btn-block tclick" data-tkey="Sign Up"
                               data-tloc="Sign-Up Page" name="commit" type="submit" value="Đăng ký"/>
                    </form>
                </div>
                <div class="modal-footer">
                    <p class="tip">Đã là thành viên? <a href="#" id="signup-signin">Đăng nhập tại
                            đây</a></p>
                </div>
                <style type="text/css">
                    .btn-lg.btn-social {
                        margin: 6px 0 10px;
                        padding-left: 12px;
                        padding-right: 12px;
                        font-size: 17px;
                        line-height: 24px
                    }

                    .btn-lg.btn-social, .btn-lg.btn-social:hover {
                        color: #fff
                    }

                    .btn-lg.btn-social:lang(fr), .btn-lg.btn-social:lang(ms) {
                        font-size: 16px
                    }

                    .btn-lg.btn-social:lang(ms) {
                        font-size: 15px
                    }

                    @media (max-width: 320px) {
                        .btn-lg.btn-social:lang(en), .btn-lg.btn-social:lang(id), .btn-lg.btn-social:lang(it), .btn-lg.btn-social:lang(de) {
                            font-size: 16px
                        }

                        .btn-lg.btn-social:lang(vi), .btn-lg.btn-social:lang(ja), .btn-lg.btn-social:lang(es) {
                            font-size: 15px
                        }

                        .btn-lg.btn-social:lang(ru), .btn-lg.btn-social:lang(fr) {
                            font-size: 13px
                        }

                        .btn-lg.btn-social:lang(ms) {
                            font-size: 12px
                        }
                    }

                    .btn-lg.btn-social i {
                        width: 24px;
                        height: 24px;
                        float: left
                    }

                    .btn-facebook {
                        background: #3b5998
                    }

                    .btn-facebook:hover {
                        background-color: #4264aa
                    }

                    .btn-facebook i {
                        background-image: url(https://d13v9yyemqd5pw.cloudfront.net/assets/social-facebook-icon-c37022864e5ca8f08800e8d1ca31b188.png);
                        background-image: none, url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGhlaWdodD0iMjRweCIgd2lkdGg9IjI0cHgiIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2aWV3Qm94PSIwIDAgMjQgMjQiPgo8ZyBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGZpbGw9Im5vbmUiPgo8ZyB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtMzY4IC0xNjgpIiBmaWxsPSIjZmZmIj4KPGcgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzMyIDkxKSI%2BCjxnIHRyYW5zZm9ybT0idHJhbnNsYXRlKDI0IDY5KSI%2BCjxwYXRoIGQ9Im0zMy43NjggOGgtMjAuNDk2Yy0wLjcwMyAwLTEuMjcyIDAuNTY5My0xLjI3MiAxLjI3MnYyMC40OTZjMCAwLjcwMyAwLjU2OSAxLjI3MiAxLjI3MiAxLjI3MmgxMS4wMzR2LTguOTIyaC0zLjAwMnYtMy40NzdoMy4wMDJ2LTIuNTY1YzAtMi45NzYgMS44MTgtNC41OTYgNC40NzMtNC41OTYgMS4yNzEgMCAyLjM2NCAwLjA5NCAyLjY4MyAwLjEzN3YzLjExbC0xLjg0MSAwLjAwMWMtMS40NDQgMC0xLjcyMyAwLjY4Ni0xLjcyMyAxLjY5MnYyLjIyMWgzLjQ0MmwtMC40NDggMy40NzdoLTIuOTk0djguOTIyaDUuODdjMC43MDMgMCAxLjI3Mi0wLjU2OSAxLjI3Mi0xLjI3MnYtMjAuNDk2YzAtMC43MDI3LTAuNTY5LTEuMjcyLTEuMjcyLTEuMjcyIi8%2BCjwvZz4KPC9nPgo8L2c%2BCjwvZz4KPC9zdmc%2BCg%3D%3D)
                    }

                    .btn-gplus {
                        background: #df4a32
                    }

                    .btn-gplus:hover {
                        background-color: #e25d48
                    }

                    .btn-gplus i {
                        margin-left: 4px !important;
                        background-image: url(img/social-gplus-icon-5eb.png);
                        background-image: none, url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGhlaWdodD0iMjRweCIgd2lkdGg9IjI0cHgiIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2aWV3Qm94PSIwIDAgMjQgMjQiPgo8ZyBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGZpbGw9Im5vbmUiPgo8ZyB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtMzY4IC0yMjApIiBmaWxsPSIjZmZmIj4KPGcgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzMyIDkxKSI%2BCjxnIHRyYW5zZm9ybT0idHJhbnNsYXRlKDI0IDEyMSkiPgo8ZyB0cmFuc2Zvcm09InRyYW5zbGF0ZSgxMiA4KSI%2BCjxwYXRoIGQ9Im0xMC45MTggMS4xMzU5YzAuMTg5IDAuMTIzMSAwLjQwMiAwLjMwMzEgMC42MzggMC41Mzg5IDAuMjI3IDAuMjQ2MiAwLjQ1IDAuNTQ4MyAwLjY2NyAwLjkwNzMgMC4yMDkgMC4zMzgyIDAuMzkyIDAuNzM3NiAwLjU1MyAxLjE5ODkgMC4xMzMgMC40NjE0IDAuMTk5IDAuOTk5MyAwLjE5OSAxLjYxMzgtMC4wMTggMS4xMjc2LTAuMjU1IDIuMDI5Ny0wLjcxMyAyLjcwNjItMC4yMjUgMC4zMjktMC40NjMgMC42MzExLTAuNzE0IDAuOTA4My0wLjI3OCAwLjI3NjItMC41NzQgMC41NTg2LTAuODg5IDAuODQ1Mi0wLjE3OSAwLjE5NDUtMC4zNDUgMC40MTQ1LTAuNDk4IDAuNjYxNS0wLjE3OTMgMC4yNTYtMC4yNjg3IDAuNTUzLTAuMjY4NyAwLjg5MSAwIDAuMzI4IDAuMDkyNCAwLjYgMC4yNzU3IDAuODE1IDAuMTU3IDAuMjA1IDAuMzA4IDAuMzg0IDAuNDU2IDAuNTM4bDEuMDIyIDAuODc3YzAuNjM2IDAuNTQ0IDEuMTkyIDEuMTQzIDEuNjcyIDEuNzk5IDAuNDUgMC42NjYgMC42ODUgMS41MzggMC43MDQgMi42MTQgMCAxLjUyNy0wLjY0NSAyLjg4LTEuOTM0IDQuMDU5LTEuMzM3IDEuMjItMy4yNjYzIDEuODUtNS43ODY4IDEuODkxLTIuMTA5My0wLjAyMS0zLjY4NTQtMC40OTEtNC43MjYxLTEuNDEyLTEuMDQ5OC0wLjg2LTEuNTc1MS0xLjg4OC0xLjU3NTEtMy4wODUgMC0wLjU4MiAwLjE3MDgxLTEuMjMyIDAuNTEyNDQtMS45NDkgMC4zMzE3LTAuNzE3IDAuOTMxNTYtMS4zNDYgMS44MDA1LTEuODg3IDAuOTc1My0wLjU4MyAyLjAwMTEtMC45NzIgMy4wNzQ3LTEuMTY3IDEuMDYzNi0wLjE2MyAxLjk0NjUtMC4yNTUgMi42NDk2LTAuMjc2LTAuMjE3NS0wLjI5OS0wLjQxMTItMC42MTgtMC41ODEtMC45NTktMC4xOTg2LTAuMzMtMC4yOTY5LTAuNzI2LTAuMjk2OS0xLjE5MSAwLTAuMjc3IDAuMDM3Ny0wLjUxIDAuMTEzMi0wLjY5NSAwLjA2NTUtMC4xOTUgMC4xMjcxLTAuMzc1IDAuMTgzNy0wLjU0MS0wLjM0MjYgMC4wNDItMC42NjU0IDAuMDYyLTAuOTY4MyAwLjA2Mi0xLjYwMjgtMC4wMi0yLjgyNTMtMC41NDgtMy42NjY1LTEuNTgzNC0wLjg3OTktMC45NjMyLTEuMzE5OC0yLjA4NTYtMS4zMTk4LTMuMzY3MyAwLTEuNTQ3NiAwLjYyMzYtMi45NTE0IDEuODctNC4yMTI0IDAuODU3LTAuNzM3NTkgMS43NDY5LTEuMjE5NyAyLjY2OTQtMS40NDUyIDAuOTE0Ny0wLjE5NDQ2IDEuNzcwOC0wLjI5MTcgMi41NzAyLTAuMjkxN2g2LjAyNDhsLTEuODYxIDEuMTM1OWgtMS44NTd6bTEuMTYzIDE4LjE0NmMwLTAuOC0wLjI0OS0xLjQ5Ny0wLjc0OC0yLjA5Mi0wLjUyNy0wLjU2NC0xLjM1MjMtMS4yNTYtMi40NzQ1LTIuMDc1LTAuMTkxNy0wLjAyMi0wLjQxNzEtMC4wMzEtMC42NzYzLTAuMDMxLTAuMTUzLTAuMDIxLTAuNTQ2MiAwLTEuMTc5OCAwLjA2MS0wLjYyMzcgMC4wOTItMS4yNjEzIDAuMjQxLTEuOTEyNyAwLjQ0Ni0wLjE1NCAwLjA2Mi0wLjM3MDUgMC4xNTQtMC42NDg1IDAuMjc3LTAuMjc4MSAwLjEzMy0wLjU2MDIgMC4zMjMtMC44NDgyIDAuNTY5LTAuMjc4IDAuMjU2LTAuNTEzNCAwLjU3NC0wLjcwNTEgMC45NTQtMC4yMjA0IDAuMzk5LTAuMzMwNyAwLjg4MS0wLjMzMDcgMS40NDUgMCAxLjEwNyAwLjQ3ODcgMi4wMTkgMS40MzgxIDIuNzM3IDAuOTExNiAwLjcxOCAyLjE1OSAxLjA4NyAzLjc0MSAxLjEwOCAxLjQyMDEtMC4wMjEgMi41MDM3LTAuMzQ5IDMuMjUxNy0wLjk4NSAwLjcyOS0wLjYyNiAxLjA5My0xLjQyOSAxLjA5My0yLjQxNHptLTQuMTk5Ny05LjI0YzAuNzkzNS0wLjAzMSAxLjQ1MzktMC4zMjkyIDEuOTgyMi0wLjg5NDEgMC4yNTU1LTAuNDAwMyAwLjQxOTUtMC44MTEgMC40OTI1LTEuMjMyIDAuMDQzLTAuNDIxMSAwLjA2NS0wLjc3NTkgMC4wNjUtMS4wNjM1IDAtMS4yNDI0LTAuMzAzLTIuNDk2Mi0wLjkxMS0zLjc1OTMtMC4yODUxLTAuNjA2Mi0wLjY2MDUtMS4wOTg2LTEuMTI1Mi0xLjQ3ODMtMC40NzQ3LTAuMzYtMS4wMjA5LTAuNTUwMy0xLjYzNzctMC41NzEtMC44MTYzIDAuMDIwNy0xLjQ5NTYgMC4zNjUyLTIuMDM1OCAxLjAzMjQtMC40NTY4IDAuNjk5My0wLjY3NTMgMS40NzkzLTAuNjU1NSAyLjM0MjEgMCAxLjE0IDAuMzE4OCAyLjMyNjUgMC45NTY0IDMuNTU4NiAwLjMwODggMC41NzUyIDAuNzA3MSAxLjA2MzQgMS4xOTU3IDEuNDYzOCAwLjQ4NzYgMC40MDE0IDEuMDQ1NyAwLjYwMTMgMS42NzM0IDAuNjAxM3oiLz4KPHBhdGggZD0ibTI0IDEwaC0zdi0zaC0ydjNoLTN2MmgzdjNoMnYtM2gzdi0yIi8%2BCjwvZz4KPC9nPgo8L2c%2BCjwvZz4KPC9nPgo8L3N2Zz4K)
                    }

                    #signup-name {
                        overflow: auto
                    }

                    #signup-name .help-block {
                        margin-bottom: 0
                    }

                    #signup-first-name, #signup-last-name {
                        width: 48.6%
                    }

                    #signup-first-name {
                        float: left
                    }

                    #signup-last-name {
                        float: right
                    }
                </style>
            </div>
        </div>
    </div>
</section>