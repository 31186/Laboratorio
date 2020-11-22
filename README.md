# Laboratório

# Estrutura
- Sign-up
  - Utilizadores (incluir linkedIn API)
  - Empresas (incluir linkedIn API)
- Login
- Perfis
  - Utilizadores Candidatos/estagiários/voluntários
    - Perfil com informações básicas (se der com autofill por API do linkedId https://docs.microsoft.com/pt-pt/linkedin/consumer/integrations/self-serve/plugins/autofill-plugin)
    - Perfil com possibilidade de inserir CV
    - Perfil com possibilidade de inserir ficheiros (certificados/diplomas)
    - Perfil mostra local/locais de trabalho/estágios e voluntariados (linka as empresas)
    - Perfil com lista de competências
    - Botão para marcar entrevista (só aparece às empresas)
  - Empresas (Empregadores/Voluntariado)
    - Perfil com informações básicas (se der com autofill por API do linkedId https://docs.microsoft.com/pt-pt/linkedin/consumer/integrations/self-serve/plugins/autofill-plugin)
    - Perfil mostra os trabalhadores/estagiários/voluntários (linka os utilizadores)
    - Botão para solicitar entrevista (só aparece aos Utilizadores)
- Pesquisa Emprego/Estágio
  - Utilizadores
    - Área de negócio (Saúde, IT, etc) 
    - Localização (incluir location browser)
    - Competências (requisitos)
  - Empresas
    - Localização
    - Competências
- Pesquisa Voluntariado (utilizadores) - Se as assiciações pudessem recrutar iam estar sempre a fazê-lo e criavam muito spam.
  - Utilizadores
    - Tipo de voluntariado (Apoio de idosos, combate à fome, auxilio em instituições, etc)
    - Localização
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
- Fazer API com BD
- Fazer frontend (usar template gratuito)
- Video chamadas (https://www.agora.io/en/) gratis para testes, em live é pago
- Após a video-chamada o processo é manual

# Extras
- Perfil permite recomendações
