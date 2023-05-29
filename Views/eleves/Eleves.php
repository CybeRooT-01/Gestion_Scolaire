<div class="container-f py-4 ml-2 mr-2">
  <h1 class="text-center mb-4">Gestion des élèves</h1>
  <div class="card">
    <div class="card-header">
      <h2 class="card-title">Liste des élèves</h2>
    </div>
    <div class="card-body">
      <div class="d-flex justify-content-end mb-3">
        <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Ajouter un élève</button>
      </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Niveau</th>
            <th>Classe</th>
            <th>date de naissance</th>
            <th>Lieu de naissance</th>
            <th>Matricule</th>
            <th>sexe</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($params['eleves'] as $eleve) : ?>
            <tr>
              <td><?= $eleve->nom ?></td>
              <td><?= $eleve->prenom ?></td>
              <td><?= $eleve->niveau ?></td>
              <td><?= $eleve->classe ?></td>
              <td> <?= $eleve->dateNaissance ?></td>
              <td> <?= $eleve->lieuNaissance ?></td>
              <td><?= $eleve->matricule ?></td>
              <td><?= $eleve->sexe ?></td>
              <td>
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal<?= $eleve->id ?>">Modifier</button>
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal<?= $eleve->id ?>">Supprimer</button>
              </td>
            </tr>
            <!-- supprimer -->
            <div class="modal fade" id="deleteModal<?= $eleve->id ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?= $eleve->id ?>" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel<?= $eleve->id ?>">Supprimer un élève</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Êtes-vous sûr de vouloir supprimer cet élève ?</p>
                  </div>
                  <div class="modal-footer">
                    <form method="POST">
                      <input type="hidden" name="eleve_id" value="<?= $eleve->id ?>">
                      <input type="submit" name="supprimer" class="btn btn-danger" value="supprimer">
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- modifier -->
            <div class="modal fade" id="editModal<?= $eleve->id ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $eleve->id ?>" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel<?= $eleve->id ?>">Modifier un élève</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="eleve" method="POST">
                      <div class="form-group">
                        <label for="nom">Nom :</label>
                        <input type="text" class="form-control" id="nom" name="modNomEleve" value="<?= $eleve->nom ?>">
                      </div>
                      <div class="form-group">
                        <label for="prenom">Prénom :</label>
                        <input type="text" class="form-control" id="prenom" name="modPrenomEleve" value="<?= $eleve->prenom ?>">
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="inputGroupSelect01">Options</label>
                        </div>
                        <!-- <select class="custom-select" id="inputGroupSelect01" cname="modNiveauEleve">
                          <option value="Enseignement Primaire">Enseignement Primaire</option>
                          <option value="Enseignement Secondaire Inferieur">Enseignement Secondaire Inferieur</option>
                          <option value="Enseignement Secondaire Superieur">Enseignement Secondaire Superieur</option>
                        </select> -->
                      </div>
                      <div class="form-group">
                        <label for="niveau">Matricule</label>
                        <input type="text" class="form-control" id="niveau" name="modMatriculeEleve" value="<?= $eleve->matricule ?>">
                      </div>
                      <div class="form-group">
                        <label for="classe">Classe</label>
                        <div class="input-group mb-4">
                          <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Options</label>
                          </div>
                          <select class="custom-select " id="" name="modClasseEleve">
                            <option selected>Choisir une classe</option>
                          </select>
                        </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="modEleve_id" value="<?= $eleve->id ?>">
                    <input type="submit" class="btn btn-primary" value="Enregistrer" name="modify">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
  <!-- ajouter -->
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addModalLabel">Ajouter un élève</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="eleve" method="POST">
            <div class="form-group text-center ">
              <label for="nom">image de l'eleve </label> <br>
              <img draggable="false" alt="Image de l'élève" class="rounded-circle ml-10" width="100" height="100" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAoHCBYWFRgWFhYYGRgaGhoeHBwaGhocHBoYHB4aHB0aHh4cIS4lHCMrHxgcJjgmKy8xNTU1HCQ7QDs0Py40NTEBDAwMEA8QHhISGjQhISE0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0MTQ0NDQ0NDQ0NDQ0NDQ0NP/AABEIAOEA4QMBIgACEQEDEQH/xAAbAAABBQEBAAAAAAAAAAAAAAAEAQIDBQYAB//EAEcQAAIBAgQDBQUGBAMFBwUAAAECEQADBBIhMQVBUSJhcYGRBhMyobFCUmJywfAUgpLRM+HxQ1OissIHFSM0s8PSJHODk6P/xAAYAQEBAQEBAAAAAAAAAAAAAAABAAIDBP/EAB8RAQEBAQEBAAMAAwAAAAAAAAABEQIhMRJBURMiYf/aAAwDAQACEQMRAD8A1GJxSqNao8TfBJP7ii+IOMvOO87VUOPSuc5xvUjuJ7qiuONf7Uy40b0ObiyJbl+xSZNShqRMSFImoMRj1C6EHuqsu4vMdKzW5z/VzexE7RFRTIJqqFwmJom0J0qQxBO1WuGtQBO9VWFAB76s7V+dDvWK1BqtS3cQiLmY8wABJLMdAoA1JPICoPehQWYwACSTsANzUmAw8lbz/GR2FP8As0b/AKyPiPKco0BJ5zna6XrOUgw9xhLP7ufsqAzjxYygPcA35qcnCLR+NWufndnH9JOUeQqZ7knTU/IeJ5fWpsOh5keX9+dd5zJ8jleur+zE4ZYGgsWgO62n9qHu8Iw0z7hAfvImRh/MkH0q1I0rqqpVUqMg/wDDdiB9i6GIPcHIzL4nP4UTgOIK4IEh1IDo0BkPKY0IPJhIPI0ZQeN4crsrqcl1fhdRrH3WH20PNT5Qdax1zK3Ov6MTERTLmN1229IoTDXcw1EMCQyzMONCASBI6HmCDzqK+SD+/SsRdSDleiFNVdq5RSYoDfatxzqyRzH96hL980E+KzSBt9aVHgedOMiw9OeMs86gL0oepFmlioyacprUCSa6mZq6oMniHGo1J5+VMFxFUDnz86k4jayEsdj8zVPirpMcvOtW6ZE2JvSYH7mqrGTJ6UTnjeqvGX4PjqP3+96G4V3mmB6D96esVOG0BqMoxWM786sbCwOs1Tq5jlVhhrvL9zQqtMO24oyxvVdZJo/BsZ20rNUSMnvbqWz8CAPc74PYtnxYFj3JHOrh7moQbkE+AHP1IHnVPwu8FS5dP+0uvH5LZ92o9UY/zGj+EnMpc/E+vgsnKB3VvmeLq+j0TkBtRaLUawOlMzlyQhgD4mHXoO/6UsiHuqu5E8hzPgBqaUHuPnSWbCrqBrzJ1J8zSvJ+EgeIn9RWaYWkynr8hTVtnm7HyUD5CfnSvbnmw8CaGlW63EvEnKUuQFjf3igmCO9Bvr8HKdexDGdafxHCsUZ0utNsFwCEIlAWjQAiYg67E1DiXDQ4M5gCPAjQ1jqetS+I3eBSC/NR3W0qBLnKmMUbbfXrVgpqrsPqOtF3bhGk8q3GaITEAHu5U9b/AOxVaz1Jh95mrAtUfSlBoay9T0A/MK6mTXUpk+KYntE9TpPQcqzuJcsSTynfxorH4iTmJHhrprr+lVT3Znp/rXRQ98ToOg+tAXrsnWla5oe+hXeay0cTJpy9KHmpbe9RgsvppUlq8Rz0mhgaazaUGtLg8YNAde+av7V9QBBEVg8O8Vd4LFdfXpWbFP8AglsQBZRAYIMR94sWLH+ssKurOOVFA7uXdVOnDUZMz3cmrlAEZzlDtLtHwgOWHhBmrfg/B7qPne6l1COzEjTfNHak/wA3Otz4OvonDWrt3tMSidB8RH6ePpFXEIigEhVGg1jypyCheIFFVmIE9TtpVQjv4/CoDmyGJnsFtRvrBHzojDXbF0ShR42KgSPSCN/nWa4L7JPj5vXGa3YP+EABneT8cMICdARrvpUGA4RcweJuWm+ArmDDRXAPZcCdCZII5FTyiTD58au9Yc/DcC/1H/r0oXG+6RS91iY2DXGyk9ykxQt/iGRWYmYEgDcnkPEnSsThuCYnH4llBBYCWZiwS2vLXUxyAG5k8jVjT0jBYuxcBCOsQZAYbGQdj0qq4bZZbQVv9nNudNfdkpPgcoPnWd4DYa29xLyQ+HZlOXcFQTKnv5dZrQcNZlsKrtLmXY9Xcl28szGsdNyJLo0quz60VebrzoI6UyOVo61dAM0Ubk86q7etTI1PwfUzXaQX45kUFeuU1bwMDar1eNFh7oA1176JF0GqDDOI02n50cL3KhYsPejrS1X5x3V1WrHnN++SZPhUV59BrSXXymDyoa65NdQUmagc61KoplzeskynoaiJpyNBqQlmpjHWoc1SqJ2qOibHKrSwwiq60kQanDxRTGnw7K9u0lwvlNmwyi2xXOXIQq0/jYGRB1PStRgLilSqqEKQpUbARIIMCQQfrWS4FiVcBCwF22OwDtctq4cDuKar4MDrBiw4HxBv4m8HVyt0qbbwSgCBgbZI0Vwcwjqp7porGg94A0EgTt391UvHOFvcVwHbLB0zbkgiNhlX1o7jNklCQYOkHoeRoThHF1ut7p+zcgmCNHA3I6HqP2MXXp4nFgvgHtgyWER7LOUAUMhRRlXQB1ZhkYbHLmBiRvFcA95nv3kh2QBQDoiTKoOp3Ynv8gZa4ZbDZsgzdaj9oeIph8Oznf4UUalnIMAD5nuBrXNv7efvnmdf6obXCEuW8xB0IM96EN5jQV3D8ScFfYsC+HvBYKAE23QGIA1YMCTpJ9DSez3H8N7kg3gciKzs4KxKCZkanQ7c9KqfYfEe+s3bZ7Vq3cK2y2+QyVBB1ELlievdTRzN+g7jNexGLv5MquhOUkTARgsnYMVUExPxRykmBTkQSSVAk7TA3q3x2HW3ZuFBACXCY1J7J67nxqlvXINcet17Jzz+BBiOTeXhQ9+8o51BefWg8QTvO/7iuseLoaMRr2fWpbV5pkmaqrF4AQaMS4OtaY1PiLk6VBmqPE3IIpgeaktMLdlTtpReGvHnVRh2jTrVpg7ZJnQDv2osMo7Ma6m+4/EvrXVnxp5feuzUAuTvy2prtTBNdWE5akJphanTWSUCaVjype4UwIaiVRRVtahVKMtII+dVMiRacDUc0nuy7Ki7sYnovM+lDRbNp3b3gkKk5SDBkaZhzgEVpfZ/iaZyLpVXMEnZLhXUPGwcAecekqYEW1AIBWIA7oiD5fWsjivjK7hSZnnqQPoTTBXofs9xg4kXbblWa2RDAfEjTGbkGEQYoC5hCMTaYSCtwGe4yrDzBob/ALP7oa84gf4Q9A4j6n1rVYvDw4PQ6VYPyy+LlVrOJhBi7rXXE2lBS2ORX7Vz+Y7fhVTzqz4zeIskL8TlUEbguYJHeFzHyqp9p+LjB4UKhAuN2EHQx2m8FHzIqE2oB7FgXh25tGSwI1BBUhJnUHXXcR11ongWAWxi8QijKrgOoG0HSB+Uz5XO6vMrHHsQGze9ee4gDcRI6b9/fXpvCcYbww19lhwz2n9D6yVU+VRyyBfa3iL++TDKcqFc7kbuoIGQdBqJ8TVfefzp3GMcl6+jpuLQLfhLkHL4gJr+YUI13ccxXOz1udWTEF27HOhr18bCdajuPuajYa1qMU/Y71MlwdaEIpCh61pgW7z30nvOVQhDp86mVATUBuAfWSJirb3s5QJA/Wq3CWiF/fpVjbEAUVqCMxrqjzn9gV1ZaeYzSKaQiuVTNdXMuWpEE0uWpGIorUdbFSLvXIOtSxsaza6SJHtgRXFgBJOlPw1lrrhEUu55cgOrH7I7zWy4d7LWkys594411+BT+Ff1aT4VKxnuFcCvX4YDJbP23B1H4E0LeJgd5os8LSzisiEkKgJZjJZiD02+LYVtM2sVnbiTimPIop+Z/tUZB2Js9j98q894yuW4w25+v+c16YbeYRzivMMeS95yNe039K6D5CmMdfVp7I8QFjEI7fA0ox+6GIhvAMAD3EnlXp98htRyMHxFeO4dAGAOoOh7wdD9a9O9k3ZsGhYywZwSeeV2WT4gTTWBBfO9kHk91/JOwP8A1K8r9rce1y+QTOUbcgz9t/Qtl8FFeh4LFAWHu/cw95gfzvcP/tivI8S5Z2Y/aYn1M1lvk/DLLqJ3IHdBOtetezSZMLhSdAz3LhnkmW649BlryfCMQwYbiCPKvVeJn3VhbJYD3eEyt1DXDbtLHo4qhvxlOHIyIGYdt+0Z5SBA8hA8qixFwTRF3F5jtA1qsxJ1BqkFqbPXO1CNd6VGMQdxTjOi2bTu51ItzWKFtXAd96V5qZGlxG9TWnIIoBNR31Pa79qcS3S9FWqpKBh+/GqiwoMR/lFW+GYwV9BWaYfkT9mupc37iurLby/LUqLXZakiurm4UqpNKiE6AEkkQAJJPIADc1teC+xgyZsQxkjREMZZ5u25P4RA6k0VqMpgcP7y4ltWALEAsfsqSATHM67Vtsb7IYf3D5Ed7oXssXeSeZCqQpjeAOVBv7IOD2Cg5SAR+n96tOH4fG2jD5LiD8Rn/l1/etZxv8og4HjkVFRICrMgCDPPNzmeZq7S4DQpwti62Z7QV/vjQ/1pB9anGBj4Ljr3SHHmHBPoRUtO51nkeMTl02gesj5N8qtrmKa0ct0LB0W4oIQn7rqSch6akHqDpVRxZsrpeAjIYYfgPPyJ+dTUq8v3MiO/3UZv6QT+lec8KsEsT3xPp/evQ8SnvLDhCDntsvd2lIn5zWN4ZZOQSIbMwYcwysQQe8HSmM9eqrE4co2U8tvDl6it97EYvPZuW+dtgw/K40/4keqXiGCzrIHaA07+6n+xF3LiMvJ7bqfzLDr6AP61MYmsyvDL5O/usmv5m/8AnWDWxtprNehYlCeGXgB9uPJbqg/SsrhMJK5456eGxP19KnTmaA4Nw8virds6TdQEfhnM3/DNb7FcMOMv4pg5UW2REP2S6rLB9NVBY7bZ55VV+zWEAxq3CNAlwz3olsH5XRW29m7BTDpI7b5rj/nuEu3pmjyog68ry64rIzI6lXQlWU7qw38R0OxBBoXFExNege3PBgyfxKDtoIuAfatD7Xim/wCUnoKweKAC6c6hiuW5STXPTSa25nrvpRq7UCtEq8VJMNKlS5QbvSI8GqJc4XGEdk+VXOFu7GssnWrfAODoSRFVg1of4sdBXUHA611ZxMMq09kgTsKlCAcqtfZrAC9iEVllLcO3Qx8CnxYT4KRzrTeNF7H8CyKL7iHb4Qd0T9CefjFasGkUU8CssnClmmzSVIhQdBUT4cRpIPcampwWasa1TX8cqHJdWUOmeJj84jY9R6UDiuEsELWSHtkaJmB010QnQjllJjoREVfYnBKwgiaoLlq7hjmtaqfiQ/Ce/oD3/WppWcH4mbRZDLJzUgh7fUMp1jvFS4iwouZ0MpcIzR9/ZX89FPfl76OPE8NiIXEJkcHQnMpUn7rpBXzI8KO/7jC9q25KkHMjwQ6no6gEMPvHN0PUR0IlmRtrMVTXbyYfFWXnTPLgCdCGRj3DKxb+Q9a02HuKqMGEuvZZdJLnRY5Q24O2vcaiPCrVpLl67la4UOZ9Qqr9xAdgep1afACCC1cAwV7QMtu67EdUFxbjf8JNUPu8spEZSViI1Uxt5VbexLrcs3rLrpMEHmjrlEz+Ees0PiWthymIF9Lywue1b94mIUKAjgfZfIoB1iQarNPPX41HgL2X3oG5sYsqfxKlkn6L6V6BbEaDl+mlYzBYTKj3ntuirbFtBcjOwd1Lu4UwskgZeQU9a2a71YOrtOI5HUHQg8wdCDXkvtFwhsLc92RNtpa03VB9gn7yyAeuh5160TQPGuGJibLWX0nVH523HwsPoRzBNCleJs5P9qaIqTGYd0d0cQ6MVYd46dQdCO41DFajFTppr0pBdH+dRGkCTtSBBNIV51GitOnnRKRP1qR2HarHDuVIIJoG0lFI+UUVLv8Ai/w/v1rqpv4wdPkKWj1eIrwSfi7yeQHU/Ot57LcMFqypI7dyHedwCOwndlUgeJNYrhWBN68lqOydX/IpGafHRf5q9PmmNU6lps100MlpZpk0oNSPFPSo1apFNSOpj2wafSinFKo8fwFHkxB6j+1VWGS/hDpL2Z1XUwvMr0Pd9dxsSKjNoHcSKsblNtKj5XXKdOy0CYPQ8qz3F7FzEuEEiyI/nbr10/fOtLbtBRlUAAchoKQIOVAlU7YRsMvvLaFxCq6KJbIsw6j7RBOq8wdNRBdh/aPDuCRcGm4hpB6ERIPcau6gxOCtvq9tHPVkVj8xUtipw+KOKByqRYkS5ibhUg5VHJJAlueoEakXiNUOWNBAA2jaKF4higiFiYgEydvOtYzadxXiq2hyLnZf1PgI9RVjXnfAM2IvvccbtnYHkoPYT038DW9w9yRWa3Kxv/aBwCUOKSSyQLg6pyfvykwe491edA176D3T1B2I5g15H7Y8BOFuygPurhJQ/d5m2e9eXUEdDVFZqhFJNNV6UmtMJ1auCxqKiU1ymKksMMSRJ0iJ/vS3WMxQSYjKw6c6OUgiZqRMldTs1dQm89l+F+5t5nEXLkFuqqPhTyBk95NXc02aazxS19SZqQvULPSZqyMSl+lKLlV9/GKp3HhIk+VSrckAjY1HB+apUNVmc1Phr3I1rBYsBS02aQPSEgrpqMvXB6FDcY0IxHIE+mtdhXlAQZkV2JEo0fdPrGlD8KTLaQHkoqQ6a6aaDXE1JFceKzHtriow5WfiZFA6ywLD+lWrUPbmvP8A21ctfW2NraFz+Z9F8wqk/wA1KyjvZ5wpCjxJ6sef6VsMMa874ZxBUYZwR5iJ8ztWwwHF7eTTOemW3cb/AJFNZ6ilXWehOJ4VL9trVwSjeoPJlPIjlQxxdxj2bDR1uOiT4AFmHmBSti3Ghst457eX/mn5UY6PKuMcEfDXTbchhEow0DpyYdDyI5HyJGCV6hxrhjYlMjpbQr2kfOzMrdyhBIPMTrWGxfs7fR/dhC5yhsyaLlP3s+XKdNj86linIpkUQ9sqxRgQymCDuDSMlTFgJl1ozC3BAFQ3FO8adafhkOYaR41vKzsG5TXUZ/Dt1PpXVlPSWaKiZutZi77Vqdlf0A/Wuw3E3u6JbZj1kBR4nlTXSRoWxKDc0Lbxpuz7sQg0Lt8PflB+Lx28Yiks8Lza3mzfgXRPPm307jWT9seMl3/h0aEXRo5xuPDlHd4UYfIuX4/hM4sg55MNc0yho2zHeTppoJq4w7ACAa8sRo0Gg6d1aXhHFWthVdTk5GDoO7qO6rFLraU+2dahtvIBB0pVatCxao8ing0DYao7uKLyqMwC6O6gEz9xJ0LdWOi89dhjFnNV44jnMWUNzq85bYP5z8XggaOcVWPbUsTLPE5xcuM9i2BzcHR3EfCNBzjcj4jHYhxKYlCq6N7vC3GCx1GdjzGg5co1opkX5TEf720P/wATmP8A+omuWxlU5rjnTZcqL5ZRmH9VZZrrsoLcTtqpP+6CT3ZmYEeoNE4ThFsuEuubhIJR0u3oJG6lTcbKYgjXUTtFWtYtMY5VS1u5cVhGhYOCO/OG+RFBJxi9OrA+KD9Io1eA4eZ93JHMu5PzapH4HZJmHHhdugegeKspnXMnsMXipyFmdwdlVESXY/Cq5w0sTp51lr2Owztca7kbEZ2VmJZQcpyjJqFKgDL1MTrvWi4s1vCYe5dRe2qkIzFnbO/ZWCxJiTJA6V5Jm0j/AFqsanXP2Rt8JilDE2EZjz93bZj01IB+Zo//ALxxP+4uT+LMPkqtFZDhDu5hXKuIjv8AOtJZ4jilyhmUyYzFZjQnUCCTpG4oxXvf1ItDxjERrhmnrNyP/TqtxvGbqjM9s9d20UbnKVUnyq3tYvEKGctaCKpZ89u4sACSZDn6Udawr3VVsQABAPuVJKTv22IBc/hgKOear6NsoTgF2/di67lbUdhcoBuT9o5gWC9NZbfb4rKxxAPee0gkWwMz/ZDtsg6mNT0kddIuJ41lItW4N1xOp7KJsbjxqFGwG7HQcyB8Jct4ZMkwgzO7tuzHVnbvPTkIHKoZaKxfB7Tq492jO89pwSRP3WnMnWFI2rz7inBXRhkW7dQgkMLTgR3HZx0Oh201mt9wjFteVrh/w2JCKRBKCVZmnqZ06AUZj7WcBM7ID9w5SeUTuPKPHlTBZvleRJZLddN/HmIOxou0iiK1/GfZkkF7TtnA2c5g8cidweU+FZW2gLZW7BGjKfiUjcR++tdOepXDvmz58WUr9411JNrv/wCKuoyfw+rzAez1lNSvvG6vqPJfhHpV0igaCkqHEYjKO+h10PxXiAto7nZVJ8+UedeTu5eXPxEk/pHppWi9qOKZ2NtfhQy56vyHl9arLGAKKhcdlh6E6wenjQr8CYZS7BRuduXlV7w3GFTkfwE/SqvE4JrbBh8MyGHKrrC2ExC9GA35g9450sy5Wp4e8gf6UZiLyIuZ2Cr1PU7ADck9BrWcwl27YhWQOHOVIYBmaNteQgknkPKbS5agh2OZ4jNytg7i2Ps/m3PPYCjXWeocXi3ugqoe3bUw7bO/4BHwDqZzaxArreIMKkgIIAUaAAbKAOXcKJXEqFCECBsO6oMOqTMgcp29DWbfXTnmSXYs3thxkKkhYlVidNgToqeEz4EVE3v1gB0soPhREzt9O1PcPXei8Jf0hVJA6LA8iYB9acUusTDLbU/dGdz3knsj0bxrThfD0xNzL/hu0DWcqF+pVZ0PcYoHEXcO4zxaYdSEJB8xIPdvU7cNg5xeuhx9otIjmCnwx5VBxHgVi8xYAJdP21VZPTMD8W2+h76KpYI9n8Vntbk5HdJYy2UGUkyZOQrrzo+9cjas3whLuGuOt5f/AA2X/ESWQup7JgCUlS05tOyNTQntF7ShEPue0Y+IfCAdjPPenRm1Ue3/ABkO64dDIQ5nI5uRAXyBPme6sgpqC45YliZJJJPealtmsmCLN0owZTBB0r0TgfFUu282UE7Opg69CDyO9eZs9E8Nx72nzqe4jkR0NRr1u7gbV5GQM6h1ZYV2AAYEHszlO/SqfFcfu20GfICqHMQpnOhKPEmPjRo02IqPhHGFdQ6HuI5qeh/etV/tEkMzkSjkmQJAkAFT93UEzt2jzqXPtytNwzALaw+Z3Bd+3ediO03SfursP86oMQj4y8ltCVQnNMfYXVrhB6SMo6lZ30zuExJjIxJA5EnpE+la32YxVvDWWuXnJdlOkEwiFgoGUbsQTrrt0q+unW8r3G421hbS5zlUQqIASTAgAAb6CqG3jmvB7kNOmvJVEwgHM7sW01MbRWf9qbd9rguYhCucDIZDKo+IW1YbETzgmCdoFM4HdZzkLudQMsnKR0IP71qq48ut1wXFl7ZnWBI584MGs97ZWVIS4qQ4fKzDmhUlZHcVgH8UdK12Dw5yNACyNNIE+HSqH2i4Rcu28if4khwsxmCTPlqInmRtVNmLr8etYrP4+p/vXUPkvf7m5/8Arb+1JXT8nD/HXrNy7ArL+0PF8i5V+Ntvwj7x/ep84I9oeMC0uVYLn4R0/E0cvr6xg7lxmJLEljuTuT+nhQoiuGAd+7qW3nv11NaLhOKW4mUgSBBB5ihPZ7IS6sAXaQCekaqOmmv+lTYzgptsHRwJOiEnOx6IBqx8KGlilsWwc+tnmTrkPQ8410PlS8L4RcZxcsp7tCdnJ7S9SgGngTVxwfhLgK+I1YaqmhVZ5sR8T9/LlzJtcVigiiASToiLuzdB9SToBqagrMBgsQLxe77srkKqEmEEzpmE68+sDoKMuYck1Df4bddZe8yvGgTsovd1bxPpyqTAYpx2LgCuNwNmHJlHQ/UGjGp1gfF8OLCFIHWhCDbyiAWHPf0q/wARcGgqpxVtS0k+ewEUWOvHe+VaYbHAjfppFTfxQgkkAdayjYwyfdK90DSbalk83Aj0k1LhwruhulXknRh2LeUSQEO7bdpp7o2qlrHU5nwdxPjxKP8Awy+8KqSz7IkaklzAY/hWTWQw/Gb1pmcOczEEggGYAWDz5CYO9bu7dtXEa2e0jKQcugA56jbf5VksfkK+6w6EJmBa4xl7kbDrlkzy2ECmiWfF/wAO9rAyg3LboebKVKeOpBHWI9azXtTxFFstbCqLl13ZoABW3nZlnmCwy6eM0ZwnhDOMxbKg2b8XNlB0MbAmQDOhgVkfaFLa4h1tMWQR2icxLZRmM8+1NLNzfFYKlWohT0NFUPFKRXCnGhpNgcY9pwyHxHJh0P8Aetvwni6OsqARsysJKzuCOf0rz81LhMU1tw6HXnOxHQ0xmtqPZ1XfNZuKo3yMCY30HVenMd+1VWOS4hdHXK0gkSCIKgSDzBg1acI4qj9pSQRGZeY/uO+rfiGBTEJuA8dh+h3AYcx3d+lWfxqX+juDMmJwSI4DAoqMDuHSFJ7jIkHwNZjH8GvYIm4B7y2NnWJAnQOp1H5l08KsPZBHRrqsjKBlkEGC/aBg7N2cuo5RWne4G0bUERB1BB3FA3L4yuC9q7zwotQTs5fSO4CZHhWr4JezpmZszmMxiNpgAcgJOnfzOtYXiHC/4e5lQxbds1ptexc52yejDbrHUVbezfESG10IYq4PI7UwdVtq6m5x1FdSy8VvYhrjsxJZ2MwoJPgANYA0oqxwLEvtbKg/achAPI9r5V6HbCW0yoFReiAKPlvQb41P9KVqn4R7JhGUvcJI3FvSeerGSdeYitNYwtu3JRQCd2OrHxYyx9aq0xzEwgM9370om3hHbV3g9Bv60K0W+K5KMx5Db1J2pcPayku5lyInko3yr3d/P0Aaqqg7I8TzPiapuK8dS3I1Z40RdTHU9B3mlLXifF0srmfwCjVmbkqjmayd+w11jevXijnZUClUQSVVifiiT60NZ4vaZs97tvBAU6qinkoO5PNjv4UUvGMOp7FtRHRFWj6fiXCo5EJibrj8CCPWCKs7XB57TIznreuAie5RKj+kVXJ7SFjCox8P7CrNcVfeOyqCOZzMfIQB60YdHg311i0QPsyywB0MR8hVJwjE5r7OyZic+kTlJInSPKrC8pKHO7kgfeyj0SPnVTwG663GyQQCQZ2KzoC3I7a1Uz40eKs4e6rIwQMyFfhAdQwIkZhOk1X4lMJh1lybjTzM+AyCF+VFPicNclWCBxujgBgf18RVbjsVhrQzKi5hoCBqT0E6ye6qMXQXFsdev27jj/6ewiGM2jP9xI5ToIHWsATWj9qGvsqPc7CMSFTmIAhmHWD4jzrNVVfotKpptdVh1MGqQGhg1PVqGtSNUZNOLVGGpgqe07KQykgjYitVwTjQchX0ca6bNHSfpWRD1xYjXn9KVr1nD40RoZHSnX8UJEGsdwHi2YZW+Ib9/LMKtb14ghh9alYs+IZblp0eSCPMEagjvmqX2buF8QyNOYxnPUpIDd0jKfM0auJzKwOhg/SgfZ3TFseqgehT/wCVQb3KPun1paKzCuqDIY7Y+VVl3Y11dSIueCfAPE/Wj+ddXVKh8TtWY4B8d/8A+5+grq6oouMfGf3yqm4X8fmfpS11B/TU2PiFH2K6upCLG/4b/kP0of2Z+D+b9BS11Yv1v9E9tPht/m/Q1Q+z3/m08D9DXV1MZvwV7ffBa/Pc+i1iq6upo/RabXV1ScactdXUGF5UldXVKlpXrq6lDODf4q+B+laofqaWuqa/SfDc/A1BwT/zPr/011dUy9Erq6uqD//Z">
            </div>
            <div class="form-group">
              <label for="nom">Nom :</label>
              <input type="text" class="form-control champnom" id="nom" name="nomEleve" required>
              <span class="text-danger d-none erreurnom">Le nom doit contenir que des lettres</span>
            </div>
            <div class="form-group">
              <label for="prenom">Prénom :</label>
              <input type="text" class="form-control champPrenom" id="prenom" name="prenomEleve" required>
              <span class="text-danger d-none erreurprenom">prenom invalide</span>
            </div>
            <div class="form-group">
              <label for="dateNaissance">Date de naissance (jj/mm/aaaa):</label>
              <input type="text" class="form-control champDateNaissance" id="dateNaissance" name="dateNaissanceEleve" required>
              <span class="text-danger d-none erreurDateNaissance">date invalide</span>
            </div>
            <div class="form-group">
              <label for="prenom">Lieu de naissance :</label>
              <input type="text" class="form-control" id="LieuNaissance" name="LieuNaissanceEleve" required>
            </div>
            <div class="form-group">
              <label for="niveau">matricule</label>
              <input type="text" class="form-control" id="niveau" name="matriculeEleve" required>
              <span class="text-danger d-none ">matricule invalide</span>
            </div>
            <span>Sexe :</span>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="sexEleve" id="masculin" value="masculin">
              <label class="form-check-label" for="masculin">
                Masculin
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="sexEleve" id="feminin" value="feminin" checked>
              <label class="form-check-label" for="feminin">
                Féminin
              </label>
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Options</label>
              </div>
              <select class="custom-select niveau" id="inputGroupSelect01" name="niveauEleve" onchange="chargerClasses()">
                <option selected>Choisir un niveau</option>
                <?php foreach ($params['typeCycle'] as  $cycle) : ?>
                  <option value="<?= $cycle->nom ?>"><?= $cycle->nom ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="classe">Classes</label>
              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Options</label>
                </div>
                <select class="custom-select " id="classe" name="classeEleve">
                  <option selected>Choisir une classe</option>
                </select>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary inscrire" value="Inscrire" name="inscrire">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
  const btn = document.querySelector('.inscrire');

  function validateInput(inputField, regex, errorClass) {
    if (inputField.value.match(regex)) {
      document.querySelector(errorClass).classList.remove('d-none');
      btn.setAttribute('disabled', 'disabled');
    } else {
      document.querySelector(errorClass).classList.add('d-none');
      btn.removeAttribute('disabled');
    }
  }
  const nom = document.querySelector('.champnom');
  nom.addEventListener('input', function(e) {
    validateInput(nom, /[0-9]/, '.erreurnom');
  });

  const prenom = document.querySelector('.champPrenom');
  prenom.addEventListener('input', function(e) {
    validateInput(prenom, /[0-9]/, '.erreurprenom');
  });

  const dateNaissance = document.querySelector('.champDateNaissance');
  dateNaissance.addEventListener('input', function(e) {
    validateInput(dateNaissance, /[a-zA-Z]/, '.erreurDateNaissance');
  });

  function chargerClasses() {
    const listeClasse = document.querySelector('#classe');
    const listeNiveau = document.querySelector('.niveau');
    let niveau = listeNiveau.value;
    console.log(niveau);
    fetch('http://localhost:8000/getTypesClasses')
      .then(response => {
        if (!response.ok) {
          throw new Error('Erreur lors de la récupération des données : ' + response.status);
        }
        return response.json();
      })
      .then(data => {
        listeClasse.innerHTML = '';
        const tableauClasses = {
          "Enseignement Primaire": data.primaire,
          "Enseignement secondaire inferieur": data.college,
          "Enseignement secondaire superieur": data.lycee,
        };
        tableauClasses[niveau]?.forEach(classe => {
          console.log(classe);
          listeClasse.innerHTML += `<option value="${classe.nom}">${classe.nom}</option>`;
        });
      })
      .catch(error => {
        console.error('Erreur lors de la récupération des données :', error.message);
      });
  }
</script>