<header>
  <h1>API Transferência de Dinheiro</h1>
</header>

<section>
  <p>Neste projeto, estou desenvolvendo uma API para transferência de dinheiro, atendendo aos seguintes requisitos:</p>
  <ul>
    <li>Crie um <strong>endpoint</strong> que recebe dois <strong>IDs</strong> de usuários e um valor monetário representando a transferência entre eles.</li>
    <li>Crie um <strong>endpoint</strong> que recebe um <strong>ID</strong> de usuário e retorna o saldo dele.</li>
    <li>Valide se o usuário de origem tem saldo suficiente antes da transferência.</li>
    <li>Considere a concorrência de transferências simultâneas, onde duas pessoas transferem dinheiro ao mesmo tempo para uma terceira.</li>
    <li>Se uma transferência falhar, o saldo do usuário de origem deve ser restaurado.</li>
    <li>Não é necessário criar endpoints para usuários; o banco deve ser populado previamente para permitir transferências entre eles.</li>
  </ul>

  <h2>Tecnologias Utilizadas</h2>
  <ol>
    <li>PHP (puro)</li>
    <li>Banco de dados (MySQL)</li>
    <li>Composer</li>
    <li>JWT (Falta implementar)</li>
  </ol>
</section>
