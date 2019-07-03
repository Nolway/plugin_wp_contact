<div class="wrap">
  <h1 class="contacts-title">Liste des demandes de contacts</h1>
  <table class="contacts-table">
    <thead class="contacts-table__thead">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Sujet</th>
        <th scope="col">Message</th>
        <th scope="col">Email</th>
        <th scope="col">Date d'envoi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach(get_all_contacts() as $contact): ?>
        <tr class="contacts-table__tr">
          <td width="5%" class="contacts-table__td"><?= $contact->id ?></td>
          <td width="20%" class="contacts-table__td"><?= $contact->subject ?></td>
          <td width="25%" class="contacts-table__td"><?= $contact->content ?></td>
          <td width="25%" class="contacts-table__td"><?= $contact->email ?></td>
          <td width="10%" class="contacts-table__td"><?= $contact->creation_date ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
