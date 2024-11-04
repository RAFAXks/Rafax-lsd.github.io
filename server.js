const express = require('express');
const app = express();
const port = 2809;

// Middleware para permitir o envio de JSON no corpo da requisição
app.use(express.json());

app.post('/recreate-text', (req, res) => {
    const { text } = req.body;
    const recreatedText = `Aqui está uma versão recriada do texto: ${text} - mas com algumas mudanças.`;

    res.json({ recreatedText });
});

app.listen(port, () => {
    console.log(`Servidor rodando na porta ${port}`);
});
