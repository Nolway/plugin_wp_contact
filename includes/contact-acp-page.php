<div class="wrap">
    <h1>Bonjour</h1>
    <p>Ceci est mon plugin de contact</p>
    <table class="contacts-table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Sujet</th>
            <th scope="col">Message</th>
            <th scope="col">Email</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach(get_all_contacts() as $contact): ?>
            <tr>
            <td><?= $contact->id ?></td>
            <td><?= $contact->subject ?></td>
            <td><?= $contact->content ?></td>
            <td><?= $contact->email ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>