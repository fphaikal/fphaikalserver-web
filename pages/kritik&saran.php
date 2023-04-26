<body>
    <section class="text-bg-light p-5 text-center">
        <div class="align-items-center justify-content-between">
            <h1>Kritik & Saran</h1>
        </div>
    </section>

    <section>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 p-3">
                <div class="container">
                    <form action="kris.php" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="text" class="form-control" id="email" name="temail" placeholder="name@example.com">
                        </div>

                        <div class="mb-3">
                            <label for="pesan" class="form-label">Isi Pesan</label>
                            <textarea class="form-control" id="pesan" name="tpesan" rows="3"></textarea>
                        </div>
                        <button class="btn btn-dark" name="submit">Submit</button>    
                    </form>
                        
                </div>
                      
            </div>
            <div class="col-md-2"></div>
              
        </div>
        
    </section>
</body>