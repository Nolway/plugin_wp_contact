<form>
    <div class="form-group">
        <label for="firstname">Nom</label>
        <input type="text" class="form-control" id="firstname" aria-describedby="firstname-help" placeholder="Entrez votre nom">
    </div>
    <div class="form-group">
        <label for="lastname">Prénom</label>
        <input type="text" class="form-control" id="lastname" aria-describedby="lastname-help" placeholder="Entrez votre prénom">
    </div>
    <div class="form-group">
        <label for="email">Adresse e-mail</label>
        <input type="email" class="form-control" id="email" aria-describedby="email-help" placeholder="Entrez votre adresse email">
    </div>
    <div class="form-group">
        <label for="subject">Sujet : </label>
        <input type="text" class="form-control" id="subject" aria-describedby="subject-help" placeholder="Sujet du message">
    </div>
    <div class="form-group">
        <label for="content">Votre message :</label>
        <textarea class="form-control" id="content" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>