# PHPUnit e WordPress

A ideia desse repositório é ter códigos para realizar um testes simples em um plugin usável no WordPress e executar as ações básicas para usar o PHPUnit com WordPress.

## Referências
- [PHPUnit Manual](https://phpunit.readthedocs.io/pt_BR/latest/) - em Português, possui todo o conteúdo importante para PhPUnit.
- [Mockery](http://docs.mockery.io/en/latest/index.html) - para facilitar a criar mocks dentro do PHPUnit.
- [Docker pra WP](https://github.com/aleemerichxpi/docker-wp) -  com PHPUnit ativo.

## Premissas

1. Seu ambiente já deve ter o PHPUnit funcional (se quiser, use [este projeto com Docker](https://github.com/aleemerichxpi/docker-wp) que já possui PHPUnit funcional).
2. Você precisa enteder premissas básicas de testes unitário. Coisas como [Padrão AAA](https://medium.com/@alamonunes/teste-unit%C3%A1rio-e-o-padr%C3%A3o-aaa-arrange-act-assert-cb81d587368a), Mocks e etc. Há inúmeros materais para consulta na Web.
3. Quando você executa um teste unitário no WordPress **não há um WordPress rodando, em execução**. Entender isso é vital para que você compreenda as premissas de testes com PHPUnit e WordPress. Você deve testar de modo atômico (um método, uma função) então não haverá todo sistema ativo para o testes. Se esse método consome coisas externas, esses dados e consumos devem ser previstos em formas de mock.
4. É possível subir uma instância em memória do WordPress (uma espécie de objeto WordPress), mas essa instância não é um site funcional. Ela **não terá plugins, temas, acesso a banco de dados e etc**. Apenas tera o CORE do WordPress funcionando, nada mais. Isso pode ser útil quando há funções ou objetos que você use dentro dos seus códigos, mas o escopo de ação é bem limitado (por isso, o isolamento do consumo dos recursos WordPress dentro de sua classe é importante).
5. É quase obrigatório que você programe totalmente orientado a objeto (OO) para conseguir criar testes com esforços condizentes com tempo de projeto. Caso contrário, você terá dificuldades e um imenso trabalho para criar seus cenários de testes (pode custar muito mais trabalho criar os cenários do que desenvolver funcionalidades, por exemplo).
6. **Os testes não precisam ficar em meio ao código desenvolvido**. isso significa que os testes podem ser repositórios a parte, se desejar. Neste cenário apresentado os testes estão junto com os códigos por comodidade.

## Pontos fundamentais

Ao criar testes para temas ou plugins, você terá que ter em mente que:

- Todas os métodos a serem testados, quando pressupões dados externos e funções externas, essas terão que ser "mokadas" (simuladas dentro do próprio testes). Isso porque a ideia do teste unitário é testar AQUELE MÉTODO, não os outros usados dentro dele (se huver, outros testes devem fazer isso). Outro ponto immportante, as ferramentas de testes unitário não tem como subir instâncias inteiras. Portanto estes métodos devem ter seus valores previamente definidos através de mocks (obviamente ha exceções, mas a regra geral é essa).
- Com base no item anterior, os métodos diretos do WordPress devem ser **isolados**, ou seja, não ficar expostos diretamente no meio do arquivo PHP, senão terão que ser mocados quando a ferramenta de teste chamar esse arquivos para testar (nos exemplos, é posível ver melhor esse impacto).

## Sobre os códigos publicados

O código principal neste repositório é um plugin, logo, é possível baixá-lo, colocá-lo em um ambiente funcional WordPress e ativá-lo. Isso irá criar duas mensagems extras no conteúdo de cada post que você navegar no WordPress adicionando o código _"Implementação por Classe - "_ e _"Implementação Direta - "_. Isso mostrará que o plugin está ativo e totalmente fucional.

A pasta `\tests` contém os blocos de testes e **são totalmente desacoplados do plugins em si** (está neste local apenas para fins didático e de disponibilidade). Esses testes mostrar duas realidades:
1. Testes baseados em código criados baseados em OO, demonstrando esforços e performance nesse cenário.
2. Testes baseados em código criados sem OO (funções diretas e ganchos WP), demonstrando esforço e performance nesse cenário.

O pontos de destaque finais são:
- O plugin foi escrito com foco OO básico para dar ideias a implementações futuras. Ele chama outras implementações para exemplificar as separações possíves dentro dos testes.
- Teste orientados a OO usam o arquivo `demo-phpunit/lib/withclass.php` como base, mostrando:
- - a possibilidade de se testar apenas um método de uma classe (não necessariamente carregar todo o plugin para isso)
- - são muito mais simples para se implementar testes unitários e isolar as utilizações de WordPress e/ou outras ferramentas, levando a não precisar subir nenhuma instânca do WordPress na maioria das vezes.
- Teste em funções diretas usam o arquivo `demo-phpunit/lib/directfunction.php` como base, mostrando:
- - Simular escritas padrão em temas e plugins WordPress escrito do modo antigo. 
- - Mostram uma ideia de esforço para contemplar testes escrito desta maneira. Nesse caso, quase não houve diferença, mas em funções mais complexa, isso pode tornar o teste inviável.
- - Foi usado nesse teste a ideia de subir uma instância do WordPress para simular o peso disso em meio a testes automatizado.

# Próximos passos

- Evoluir os testes para cenários mais complexto e próximos do dia a dia dos times.
- Comparar esse teste inicial com testes em outras ferramenta para definir o rumo que vamos tomar em relação ao assunto dentro da empresa.
- Aperfeiçoar, se necessário, o repositório com mais dados e testes.



