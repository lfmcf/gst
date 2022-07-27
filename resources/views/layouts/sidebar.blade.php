<div class="sidebar">
    <a href="/" class="logo">Logo</a>
    <ul>
        <?php if(Auth::user()->role === 'admin') { ?>
        <li>
            <a href="/">Dashboard</a>
        </li>
        <?php } ?>
        <li>
            <a href="/client">Client</a>
        </li>
        <?php if(Auth::user()->role === 'admin') { ?>
        <li>
            <a href="/inproduct">Produit interne</a>
        </li>
        <li>
            <a href="/exproduct">Produit externe</a>
        </li>
        <?php } ?>
        <li>
            <a href="/vendeur">Vendeur</a>
        </li>
        <li>
            <a href="/charge">Charge et virement</a>
        </li>
        <li>
            <a href="/vente">Vente</a>
        </li>
        <?php if(Auth::user()->role === 'admin') { ?>
        <li>
            <a href="/users">Utilisateurs</a>
        </li>
        <?php } ?>
    </ul>
</div>