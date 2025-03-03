<div class="container d-flex justify-content-center flex-col p-1 p-sm-5">
    <div class="row"> 
        <div class="p-3 col-12 col-sm-6 text-center text-light flex flex-col justify-content-center align-items-center">
            <h1 class="text-light pb-4">tipica imagen abstracta</h1>
            <img 
                src="http://img.freepik.com/free-vector/hand-drawn-matisse-style-illustration_23-2149569710.jpg?t=st=1740959952~exp=1740963552~hmac=b9cfe97c31eaab7251f1e6d3a9dab5c90c66ec44674f77d50278dd5cce8a5841&w=740" 
                class="img-fluid" style="border-radius: 10%;" alt="tipica imagen abstracta"
            >
        </div>
        <div class="col-12 col-sm-6">
            <div class="card text-dark p-3 bg-gradient" style="border-radius: 5%;">
                <div class="card-body p-4 text-dark  justify-content-center">
                    <h2 class="card-title text-dark text-center">Ingrese los datos de registro</h2>
                    <form action="registro-usuario" method="POST">
                        <div class="form-group">
                            <label for="username" class="form-label">Nombre de Usuario</label>
                            <input type="text" class="form-control" id="username" placeholder="Ejemplo: Juanito123">
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label text-dark">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="hola123@mail.com">
                            <small id="emailHelp" class="form-text text-muted">Lo usaremos para identificarte.</small>
                        </div>
                        <div class="form-group">
                            <label for="tel" class="form-label text-dark">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="password">
                        </div>
                        <div class="form-group">
                            <label for="tel" class="form-label text-dark">Repetir Password</label>
                            <input type="password" class="form-control" id="password" placeholder="password">
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary rounded" style="width:auto;">Registro</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>