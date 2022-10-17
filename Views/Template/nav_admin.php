    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user">
            <img class="user-img" src="<?= media(); ?>/images/avatar (2).png" width="75" height="75" />

            <!-- <img class="app-sidebar__user-avatar" src="<?= media(); ?>/images/avatar.png" alt="User Image"> -->
            <div>
                <p class="app-sidebar__user-name"><?= $_SESSION['userData']['nombre_usuario']; ?></p>
                <p class="app-sidebar__user-designation"><?= $_SESSION['userData']['nombre_rol']; ?></p>
            </div>
        </div>
        <ul class="app-menu">
            <?php if (!empty($_SESSION['permisos'][1]['ver'])) { ?>
                <li>
                    <a class="app-menu__item" href="<?= base_url(); ?>/dashboard">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAOJJREFUSEvtV8ENgzAM9G1SNimbtJOVTcomZZOrXIEUihIbEokgxRKv2BxnXc4GclLgJFypB5jkTUT0iQaAMTy0av7ztXbDmCQd7R8APDWP5EtEHkbNBKALc1bAJO8i8nYAjwD6GVjztc6KPmTegFurY4K5lLg6ANPCpISq1WxUGynT0Q6tTCcb2Lq8sfNqgLVdHweL0DI9VzBtmbMF7hoSJPMt08F0k1IM2Bpxv5EWKLQk8N6xmN/qNhYTYruUV9e5gRxxLl30dOGzIj6djjiXp8a13lqfXeq8nj+JUoys93wBuoHbH+b7GmMAAAAASUVORK5CYII=" />
                        <span class="app-menu__label">Dashboard</span>
                    </a>
                </li>
            <?php } ?>

            <?php
            if (!empty($_SESSION['permisos'][2]['ver']) || !empty($_SESSION['permisos'][3]['ver'])) {
            ?>
                <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAcFJREFUSEvtVsFxwkAMlDoJlSRUklBJoJJAJXEqCZ0osx7Js5bvfIfDDB/0YcaWb7XSag+VB4U+CFeewJs6b2YvIvIhImdVvfYc0tVqM3sTkU8RwS8OHkTkFCBm9u3vTr3gTWAz+3I2mQgKuKjqMeWgoGOL9SqwmaF9AI4Ao1dnh2cAP6jqQKzxfNdqeQv4V0QwP1HVKddbj/YiRobpGYo5r7FuAZt/DNEc+CBiOKjqHu/MLApd5OciqsCuVByEKAEvQMysWmg3sDMItWKWe1Ixz34qioCbAmu1mgFijbBS49w9UBDEBSVj5RD/m7Gz5gNzxwIUxYTYrqq6WxPWKNZWgoOD+XsyEOwwmDJoHAdFTwZTwugCbhXn4FFYjGGmi1vFFR6M72AcHDj4ByYC5vEiuVgVvMjYVwmOhTb2xEzFSWhFhS+AKzND5fnWyUXllWNRjiJkBiXgMAHkre4jXYexRpOLuSirTjYDTka/qLLW89oO87zZ6xfrdIvlcRFJE+zdbECzG4tvHE5qOk9mT6wnA6FRIH3276QG3LxPC8BsJM0xMfCkwjyPnn1K29AP3HP4PXPuYplbCnoCb+napm/+AI+gAC49+WrxAAAAAElFTkSuQmCC" />
                        <span class="app-menu__label">Usuarios</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (!empty($_SESSION['permisos'][3]['ver'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/usuarios"><i class="icon fa fa-user"></i> Usuarios</a></li>
                        <?php } ?>

                        <?php if (!empty($_SESSION['permisos'][2]['ver'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/roles"><i class="icon fa fa-gear"></i> Roles</a></li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>

            <?php
            if (!empty($_SESSION['permisos'][6]['ver']) || !empty($_SESSION['permisos'][7]['ver']) || !empty($_SESSION['permisos'][8]['ver']) || !empty($_SESSION['permisos'][9]['ver'])) {
            ?>
                <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAItJREFUSEvtlVEOgCAMQ+3NPJrejKNwk5qYzRD1p/twJI7PhdLw1gGWpIUk36WMPyNfqE/UJDdj3gC0W01uBwA/79K+oiZJ27G7aKhFjB8+cxnLVwoIKtWe6tXodQDdUu01GaxPxiicK1yZ45SDWm5iQFDj5OP0s7c67VsMhFSWVKplZFFBoY6Sk3UHNedaH3qWQJ0AAAAASUVORK5CYII=" />
                        <span class="app-menu__label">Servicios</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (!empty($_SESSION['permisos'][6]['ver'])) { ?>
                            <li>
                                <a class="app-menu__item" href="<?= base_url(); ?>/alimentacion">

                                    <i class="app-menu__icon fas fa-utensils" aria-hidden="true"></i>
                                    <span class="app-menu__label">Alimentacion</span>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (!empty($_SESSION['permisos'][8]['ver'])) { ?>
                            <li>
                                <a class="app-menu__item" href="<?= base_url(); ?>/hospedajes">

                                    <i class="app-menu__icon fa  fa-campground" aria-hidden="true"></i>
                                    <span class="app-menu__label">Hospedaje</span>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (!empty($_SESSION['permisos'][9]['ver'])) { ?>
                            <li>
                                <a class="app-menu__item" href="<?= base_url(); ?>/transportes">

                                    <i class="app-menu__icon fa  fa-car-side" aria-hidden="true"></i>
                                    <span class="app-menu__label">Transporte</span>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (!empty($_SESSION['permisos'][7]['ver'])) { ?>
                            <li>
                                <a class="app-menu__item" href="<?= base_url(); ?>/tours">

                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAhJJREFUSEvdVbFOw0AMtQ9Ke4SlLQxMMPAJ7B1gBYkfAIn+BwN8B0P5AQYkJCQY2Bj4BIYyMdDShXBqRe+QC67cKGkuB1IksrTK5fz87PdshJIeLAkXfgXcN/GxA1h3Fm7WouixCIlg4N5HfIkIewyGCPuNWnTtCx4E/BrH20rBgwRBhKtGLTr4n8DEqpRSczlLEZdvL7O+8xLXixls1lTtcGzHLQRsUTAE7KLCi3pVn4YkMReYAKtQvXXgNrMzx+4Qhrvrut4tksBc4J55v2OGzJJ+k4kQ+4Ze3voT4IExLQv27idYp6mjNv1/Mx9PGRWYfuOTQCZjybapo0Wh5E8Z2IG756ooUDt1re+DgSVbpdQpC6hn3o8Q8FwE7oxgdLYES0/cCgv2GQAuVvVKZ14CqYz7JqbgR3RRsk0DphakvKerc0ufCkxqrkBlYhuZuUzoR2RtPmfLOesOSQMO3PQsjbmXj/liUlgjGG2l2YiSyLNXIeC+iWeERTYK8fC3Hjwf2UcCZEuFTjBvYNlfKjGNUGvtyXR8ArZ9rVSU8WSKkW9X9coOXZa2Kzq9vBgPhuaE2SVtIs+k9fI6mLskKlA5lxspOZNnhs1vJ9ekjLMsv9dgSh/JOjy55JQLYpxYEJAXkG0m+x8EzIxpCqWxTAblhVJEYJk99pk+nAB5fEEtbIzt+DlvOfAdL1XnlS3kvDTgL6wwGi4wc156AAAAAElFTkSuQmCC" />
                                    <span class="app-menu__label">Tours</span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>


            <?php
            if (!empty($_SESSION['permisos'][4]['ver']) || !empty($_SESSION['permisos'][5]['ver']) || !empty($_SESSION['permisos'][8]['ver']) || !empty($_SESSION['permisos'][11]['ver'])) {
            ?>
                <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAItJREFUSEvtlVEOgCAMQ+3NPJrejKNwk5qYzRD1p/twJI7PhdLw1gGWpIUk36WMPyNfqE/UJDdj3gC0W01uBwA/79K+oiZJ27G7aKhFjB8+cxnLVwoIKtWe6tXodQDdUu01GaxPxiicK1yZ45SDWm5iQFDj5OP0s7c67VsMhFSWVKplZFFBoY6Sk3UHNedaH3qWQJ0AAAAASUVORK5CYII=" />
                        <span class="app-menu__label">Proyecto</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (!empty($_SESSION['permisos'][4]['ver'])) { ?>
                            <li>
                                <a class="app-menu__item" href="<?= base_url(); ?>/grupos">

                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAASdJREFUSEvtlmEOwiAMhdubuJu4m+jJ9CbuJu4mz3ShhjHYnkicJpLsD4F9tDz6qrLT0J24QoMBHETkVHHQQVWHdB8FBnCphDrvqqrnGM6CURFpvGVU1e4lMICjiNzCpj6XttKh1vZuRvxV4ERodn9jYa6YraqIc1lg5/xafgvMKvxnxWVPyURiY/EePfqm4gIQQ52RhTcTVwL1WluMvAk4hapqH1JpNXsz7VH6+Xecgyb3SMNpVa9Bt+DV4gJgXmvR+HgaQji5q9rKY5xCmzfLG1MzoSIOJ76nYEI0BnSvnbkYBTYgAZmywDrWu2BreewT9+KPgHN1+Q8utUO1d8y6H7tu1q/NGoHMk2J/yqzrrEUqdiChkEwqbjgWTf1m69MQPvvVbuAHpMJiLiR0EN0AAAAASUVORK5CYII=" />
                                    <span class="app-menu__label">Grupos Organizados</span>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (!empty($_SESSION['permisos'][5]['ver'])) { ?>
                            <li>
                                <a class="app-menu__item" href="<?= base_url(); ?>/comunidades">

                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAPxJREFUSEvtluENwiAQhd+bRJ1E3UQnUTdxE+sk6iTPXEMb0toCitLEkvQPPe7j7h4HRKHBQlxEgSVtANgXMyqSVcgwCJa0BHALOer8X5G8j62JAVukl0TwNhR1Krh26FLfbGZwLmfExcBnAA8ACwA7F9HYnB+01dyEV9c+NdWJpe6Z70naRn8OPpE8vgOOrbH5biGS5GKfGFiSCcYahj9iheTb2XrrXlfn6DAYsSTLfWPwqYiG1vdTPQkwyfqYvdhMfnH5kGJgOwquSOvOdRjbuWZxNSofV3WxGhcD/424rEfbc6bbq3O2z/YRGHwI5KT6vmbwtzLb81ss1U/fWgwuia0kJQAAAABJRU5ErkJggg==" />
                                    <span class="app-menu__label">Comunidades</span>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (!empty($_SESSION['permisos'][11]['ver'])) { ?>
                            <li>
                                <a class="app-menu__item" href="<?= base_url(); ?>/voluntarios">

                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACUAAAAlCAYAAADFniADAAAAAXNSR0IArs4c6QAAAk9JREFUWEftltFRAzEMRKVOSCWQSiCVQCohVEKoBKhEzN7Ynj1F9imXfGSG+Asud/bTaiVZ5QaX3iCT3KGyWflfSpnZm4j8qOohq1B972ylzOxBRF5E5BGHisiXiBxVFX9Py8yeROSz/Ls7FywNRTCvQeQA+lBVqAOobxEBfF1ngZ0DhcihwGgdVHVXAsD7DLZhNUebpKCKP1ihSZmy8TMdjudQ5RiApdXKQhlFNqlB/oEa76Qi/LUtacRz+A9r9t1FSjnTiqqeBOLeQcVtAsPjUSqFi0qZGSJFxFhNBY60pArmrqsdbmZN5SigSLEMFJd3U8FBMXhT08NeEwqeYRX2tfTJV1yZzTuZ1K9SqngD/Yer71iqD8BcfXh9i+or3zHsSTA9sy+mr2zuK6y3Xzs4aCMNdlR5+C0FRWDwTtTR8QoDsQ8rw3X7lDM1DoRymH2/1IOm2dfp5nWLfelXbU6u9tSS3NHvxeRQFQHwuAEQUtkFS6WvRI+NoRIU8qveFtAyJpNTZeIbFEPt7PhpCDaEKjA8QjKizW4MBIcK5krtVmMXynXyDEyk3ixN2YoMoTpAUACpgbm9H6rx/dWm3RpIMb5rhWMrGq6+g59s3JOtcxGcjSbf5aMhHUFxFw5n3VIug4Nn/nE305P+NYMK0pbuwh7U+cerNbxnjaDSl7JOn/I24OvM8DrkoTiC9AAdeIytMFO9+G/61DdSD8WVkZ5VA6hVQY6gVvuJyv8qUK3P+HGxVHEDX9W5B7MPB3HdIzX71gBd8s0dKqveXamsUn+wLkU1eproqwAAAABJRU5ErkJggg==" />
                                    <span class="app-menu__label">Voluntarios</span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>

            <?php
            if (!empty($_SESSION['permisos'][11]['ver']) || !empty($_SESSION['permisos'][12]['ver'])) {
            ?>
                <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACUAAAAlCAYAAADFniADAAAAAXNSR0IArs4c6QAAAPhJREFUWEftWMENwjAMPG/CJtBN6CYwCTAJbEI3OWRUpNCmlU1QFIQt9VU7PV3Obi6CBkMaxIQAZd2VLFMkNwB21kUK8gYRuU3rl0Cx4EPe0qOIHNKiGSiSewAn78oF+TcR6bygZvQWAHiVqjz00XCDmhV8ARAmu/FnoMaOfRIpIsMao1WYInlPNNLl2jwFGaBGNtpgytuRVbYvQOWmbY4Vktek+/roviXtxJxyaComuunoEpr6dU2lB/9zE+ep+PeppgBcvEwY8rcA1Mp95GYM6xenmNyM+jGd0LVCG6NfNaP6kqR2k1JcI9S2vxneuAqy0h5MWZl6ADfZQjWdTvOqAAAAAElFTkSuQmCC" height="30" width="30" />
                        <span class="app-menu__label">Info</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (!empty($_SESSION['permisos'][11]['ver'])) { ?>
                            <li>
                                <a class="app-menu__item" href="<?= base_url(); ?>/contenido">

                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACUAAAAlCAYAAADFniADAAAAAXNSR0IArs4c6QAAAYNJREFUWEftmOtRAzEMhLWVwFUCqSSkEqASQiWESkgnYjYj32gu4+fZMweJ/9wfPz6vtZbOkA02bJBJ/h6Uqj6KyIeI8FvTPgG81QzwfaNKGdBP48RnEWkGS0FRoZdGKA5rBktBfYnIs0G9i8gpAxiO2ndrAiuFOgA4pqBUlRvgRpatGmwkFGGCQarARkERYmfKVYMNgwIwmYN5pFVgQ6EYXC1g1VAW0MGV52CARaBfYshF/MPieknGWAsUb+pXW/AI4GCKxNwXMy3B6Oqrq6YnFOOmNgPsekFRkb1t/9vfX6rKDPCUuWR9lugDtSLtXIaqKtUMbvzHUGbxqlLGx80QpVTVu6/oNAHMhro5qOC+UqWm0HGIUkUUiU53qFIFhyh1d99SflX1Pw5zjb5JpVzhVhpGAoBlyo3lvmJ5Ih17uo/yz0ewEiyU0pxm8kcb5k1VnizG+Os+qrG+n9OPXyT3wEGwUI/3hIvW51wk+z5l9ZOXfC0cFUq+S2Sh1hK0jN8k1C/2tmo1JX3xYAAAAABJRU5ErkJggg==" height="30" width="30" /> <span class="app-menu__label">Contenido</span>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (!empty($_SESSION['permisos'][12]['ver'])) { ?>
                            <li>
                                <a class="app-menu__item" href="<?= base_url(); ?>/imagenes">

                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACUAAAAlCAYAAADFniADAAAAAXNSR0IArs4c6QAAAaJJREFUWEftWMFtwzAM5E3SbtJmkjaTtJ2k6ST1Jk0mYXGCZDCKZFOGbfghAkGARGZOR/JIBnJAwwExSQfljUqRKVV9FpFXrxPnuauIXAHwfdIeQKnq7waALIgvAJ9TqO5AqSoPf8zdZIXvzwAuNT85KMtSoHsFAMkFU4Iv2gXA2Qvqzzx4AjCsBSqLQgdVJbYz5c25zlRiSlW/RYTCWJSR3ZlSVbYkatwA4FQK6a6gYp+kviUrqvWmoFT13baIQq9k+Ci8d2HcDFR0/CYiZGOYaN4PYeRlRITP0n5ael+1zZi8Cb2LjmMe1VRhsum2TAlFUIW8YWhSc635L4bRo2v5lFADtXTGGsMYLxYwzQ16s6BWmLFCGFdN9JigHtarYYxFYQfIPrpsPrqw7G8NceOmMs7dMYfs4y9mIWFlUlKsMaRBcPNEZ1OlyC2xvNJs6/H4G3UtB0XtYfnPaVDpR7YBxV+KekK2njzXM2duaZ+LPvJVzS64DFO+lLD1hM92+y9hsU41MtN0vIPy0nVUpjgyp6qmplW3790S3cvortXXAuoflnZHNXuWvEEAAAAASUVORK5CYII=" height="30" width="30" /> <span class="app-menu__label">Imagenes</span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>

            <li>
                <a class="app-menu__item" href="<?= base_url(); ?>/logout">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAASVJREFUSEvtltGNAjEMRGc6uVKgk6MSoBK4So5S6GTQSOslC3uneLMiQsLS/iBHDzvjcYhOwU5cvBdY0hcAf1VB8vKYmK5Y0gnAdxXxnnQF8EPyED+lwJIMNHhpbKP6LPgXwAaAK9gl6D7nOEbVS8EXkttasCR9wM2tHlTuu/O9z8YarbawHNcASbJwPNNW7Cy8GTxXzgAOpU9mNfKrwZKishrheq5LFxtHZgk45F8Dnstxy8fWZypuBU/mPAPOtHo/uFlUfiY5cbVqcKa/hbh8bEfy/Hi+GVyuwzD7YpwMfVp//hNrgGNJjHco6VCuuz9G7uPVuTdXIaR+a9FLPaH+5odAt6ePPdnenDGYaMzEw1P7uDD91z9vE/f6b+qiiteAdwPfAMXn3x8RFp1CAAAAAElFTkSuQmCC" />
                    <span class="app-menu__label"> Cerrar sesion</span>
                </a>
            </li>
        </ul>
    </aside>