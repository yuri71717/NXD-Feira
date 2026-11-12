<?php
define('APP_NAME', 'NXD');
define('APP_SUBTITLE', 'Gestão Escolar');

$usuario = [
    'nome' => 'Prof. Carlos Eduardo',
    'email' => 'carlos.eduardo@escola.gov.br',
    'codigo' => 'NXD2026',
    'cargo' => 'Professor'
];

function usuario_atual() {
    global $usuario;
    return $usuario;
}

// Dados de exemplo para o layout
function get_turmas() {
    return [
        1 => ['id' => 1, 'nome' => '1º A · Informática', 'curso' => 'Desenvolvimento de Sistemas', 'periodo' => 'Manhã', 'sala' => '12', 'alunos' => 32],
        2 => ['id' => 2, 'nome' => '1º B · Administração', 'curso' => 'Administração', 'periodo' => 'Tarde', 'sala' => '08', 'alunos' => 28],
        3 => ['id' => 3, 'nome' => '2º A · Informática', 'curso' => 'Desenvolvimento de Sistemas', 'periodo' => 'Manhã', 'sala' => '14', 'alunos' => 30],
        4 => ['id' => 4, 'nome' => '2º B · Administração', 'curso' => 'Administração', 'periodo' => 'Tarde', 'sala' => '10', 'alunos' => 26],
        5 => ['id' => 5, 'nome' => '3º A · Desenvolvimento', 'curso' => 'Desenvolvimento de Sistemas', 'periodo' => 'Noite', 'sala' => '06', 'alunos' => 24],
    ];
}

function get_turma($id) {
    $turmas = get_turmas();
    return $turmas[$id] ?? $turmas[1];
}

function get_alunos_turma($turma_id = 1) {
    return [
        'Ana Beatriz Santos',
        'Bruno Almeida',
        'Carlos Eduardo Lima',
        'Gabriel Martins',
        'Juliana Oliveira',
        'Matheus Ferreira',
        'Mariana Costa',
        'Pedro Henrique'
    ];
}

function get_aulas() {
    return [
        ['hora' => '18:20', 'fim' => '19:10', 'materia' => 'Matemática', 'turma' => '1º A · Informática', 'sala' => '12'],
        ['hora' => '19:10', 'fim' => '20:00', 'materia' => 'Física', 'turma' => '2º B · Administração', 'sala' => '10'],
        ['hora' => '21:10', 'fim' => '22:00', 'materia' => 'Programação', 'turma' => '3º A · Desenvolvimento', 'sala' => '06']
    ];
}

function get_laboratorios() {
    return [
        1 => ['id' => 1, 'nome' => 'Laboratório 01', 'computadores' => 20, 'descricao' => 'Informática básica'],
        2 => ['id' => 2, 'nome' => 'Laboratório 02', 'computadores' => 30, 'descricao' => 'Desenvolvimento'],
        3 => ['id' => 3, 'nome' => 'Laboratório 03', 'computadores' => 25, 'descricao' => 'Redes e hardware'],
        4 => ['id' => 4, 'nome' => 'Laboratório 04', 'computadores' => 35, 'descricao' => 'Multimídia']
    ];
}

function get_reservas() {
    return [
        [
            'id' => '1',
            'lab_nome' => 'Laboratório 02',
            'turma_nome' => '1º A · Informática',
            'data' => '24/10/2026',
            'inicio' => '18:20',
            'fim' => '19:10'
        ],
        [
            'id' => '2',
            'lab_nome' => 'Laboratório 03',
            'turma_nome' => '3º A · Desenvolvimento',
            'data' => '25/10/2026',
            'inicio' => '21:10',
            'fim' => '22:00'
        ]
    ];
}

function get_avisos() {
    return [
        1 => [
            'id' => 1,
            'titulo' => 'Reunião pedagógica',
            'data' => '22/10/2026',
            'categoria' => 'Coordenação',
            'texto' => 'A coordenação informa que haverá uma reunião pedagógica. Consulte a coordenação para confirmar o horário e o local.'
        ],
        2 => [
            'id' => 2,
            'titulo' => 'Uso dos laboratórios',
            'data' => '21/10/2026',
            'categoria' => 'Infraestrutura',
            'texto' => 'As reservas devem ser realizadas com antecedência pelo sistema. Mantenha os equipamentos organizados após o uso.'
        ],
        3 => [
            'id' => 3,
            'titulo' => 'Calendário escolar',
            'data' => '20/10/2026',
            'categoria' => 'Acadêmico',
            'texto' => 'Consulte o calendário letivo para acompanhar as atividades, conselhos e prazos de entrega.'
        ]
    ];
}

function get_ocorrencias() {
    return [
        [
            'id' => '1',
            'aluno' => 'Gabriel Martins',
            'turma' => '1º A · Informática',
            'data' => '24/10/2026',
            'texto' => 'Aluno chegou com atraso excessivo e sem material pedagógico.'
        ],
        [
            'id' => '2',
            'aluno' => 'Pedro Henrique',
            'turma' => '2º B · Administração',
            'data' => '23/10/2026',
            'texto' => 'Uso indevido de aparelho celular durante atividade avaliativa em sala.'
        ]
    ];
}
