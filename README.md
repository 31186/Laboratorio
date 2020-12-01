# Laboratório de Programação

# Tema - Web platform for Employment/Volunteering/Internship

# Estrutura
- Sign-up
  - Utilizadores (incluir linkedIn API)
  - Empresas (incluir linkedIn API)
- Login
- Perfis
  - Utilizadores (Candidatos/estagiários/voluntários)
    - Perfil com informações básicas (se der com autofill por API do linkedId https://docs.microsoft.com/pt-pt/linkedin/consumer/integrations/self-serve/plugins/autofill-plugin)
    - Perfil com possibilidade de inserir CV
    - Perfil com possibilidade de inserir ficheiros (certificados/diplomas)
    - Perfil mostra local/locais de trabalho/estágios e voluntariados (linka as empresas)
    - Perfil com lista de competências
    - Botão para marcar entrevista (só aparece às empresas) - com mensagem
  - Empresas (Empregadores/Voluntariado)
    - Perfil com informações básicas (se der com autofill por API do linkedId https://docs.microsoft.com/pt-pt/linkedin/consumer/integrations/self-serve/plugins/autofill-plugin)
    - Perfil mostra os trabalhadores/estagiários/voluntários (linka os utilizadores)
    - Botão para solicitar entrevista (só aparece aos Utilizadores)
- Pesquisa Emprego/Estágio
  - Utilizadores a pesquisar por empresas
    - Área de negócio (Saúde, IT, etc) 
    - Localização (incluir location browser)
  - Empresas a procurar por utilizadores
    - Localização (incluir location browser)
    - Competências
- Pesquisa Voluntariado (utilizadores) - Se as associações pudessem recrutar iam estar sempre a fazê-lo e criavam muito spam.
  - Utilizadores
    - Tipo de voluntariado (Apoio de idosos, combate à fome, auxilio em instituições, etc)
    - Localização (incluir location browser)
- Recrutamento
  - Utilizadores
    - Página para gerir as entrevistas
      - Listar pedidos de entrevista pendendes
        - Aceitar entrevista
          - Escolher horário dentro dos disponíveis
        - Recusar entrevista
      - Listar entrevistas aceites
        - Fazer entrevista programada (video-chamada)
        - Cancelar uma entrevista programada
      - Listar entrevistas passadas
        - Histórico
  - Empresas (Empregadores/Voluntariado)
    - Página para gerir as entrevistas
      - Listar pedidos de entrevista pendendes (requisitados pela empresa)
        - Cancelar pedido de entrevista
      - Listar entrevistas marcadas (aprovadas pelos utilizadores)
        - Fazer entrevista programada (video-chamada)
        - Cancelar uma entrevista programada
      - Listar entrevistas passadas
        - Histórico

# Abordagem
- 1º Desenhar BD
- 2º Procurar Template
- Implementar

# Integração de APIs externas
- LinkedIn
- Agora / Twilio

# Notas
- Video depende de FE
- Video chamadas (https://www.agora.io/en/) gratis para testes, em live é pago
- Após a video-chamada o processo é manual
- Linkedin Integration: https://artisansweb.net/login-with-linkedin-in-laravel-using-laravel-socialite/ e https://docs.microsoft.com/en-gb/linkedin/consumer/integrations/self-serve/sign-in-with-linkedin

# Extras (conforme o tempo restante)
- Notificações
- Portfolio
- Perfil permite recomendações
- Multi-language -> deveria ser de ínicio?
