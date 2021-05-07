<section>
    <div class="row justify-content-center">
        <div class="col-6 align-self-center mt-5">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped tablesorter" id="container">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Terjual</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['ratarata'] as $ord) : ?>
                            <tr class="text-center">
                                <td>1</td>
                                <td><?= $ord['ProdukID']; ?></td>
                                <td><?= $ord['rata_rata']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>