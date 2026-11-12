document.addEventListener('DOMContentLoaded', function () {
  // Filtro de turmas
  const searchInput = document.getElementById('searchTurmas');
  if (searchInput) {
    searchInput.addEventListener('input', function (e) {
      const term = e.target.value.toLowerCase().trim();
      const rows = document.querySelectorAll('.card-turma-item');
      let visibleCount = 0;

      rows.forEach(function (row) {
        const text = row.textContent.toLowerCase();
        if (text.includes(term)) {
          row.style.display = '';
          visibleCount++;
        } else {
          row.style.display = 'none';
        }
      });

      const countDisplay = document.getElementById('turmasEncontradas');
      if (countDisplay) {
        countDisplay.textContent = term ? visibleCount + ' turma(s) encontrada(s)' : '';
      }

      const emptyMsg = document.getElementById('nenhumaTurma');
      if (emptyMsg) {
        if (visibleCount === 0) {
          emptyMsg.classList.remove('d-none');
        } else {
          emptyMsg.classList.add('d-none');
        }
      }
    });
  }

  // Alternar presenca e falta
  const attendanceBtns = document.querySelectorAll('.attendance-toggle');
  attendanceBtns.forEach(function (btn) {
    btn.addEventListener('click', function () {
      const studentId = this.getAttribute('data-student');
      const hiddenInput = document.getElementById('status_' + studentId);
      if (!hiddenInput) return;

      const isPresent = hiddenInput.value === 'P';
      if (isPresent) {
        hiddenInput.value = 'F';
        this.classList.remove('attendance-present');
        this.classList.add('attendance-absent');
        this.innerHTML = '<i class="bi bi-x-lg me-1"></i> Ausente';
      } else {
        hiddenInput.value = 'P';
        this.classList.remove('attendance-absent');
        this.classList.add('attendance-present');
        this.innerHTML = '<i class="bi bi-check-lg text-danger me-1"></i> Presente';
      }

      atualizarTotaisChamada();
    });
  });

  function atualizarTotaisChamada() {
    const inputs = document.querySelectorAll('input[name^="presenca"]');
    if (!inputs.length) return;

    let presentes = 0;
    let ausentes = 0;

    inputs.forEach(function (input) {
      if (input.value === 'P') presentes++;
      else ausentes++;
    });

    const labelPresentes = document.getElementById('totalPresentes');
    const labelAusentes = document.getElementById('totalAusentes');
    if (labelPresentes) labelPresentes.textContent = presentes;
    if (labelAusentes) labelAusentes.textContent = ausentes;
  }

  // Selecionar dia no calendario
  const calCells = document.querySelectorAll('.calendar-day-cell[data-day]');
  calCells.forEach(function (cell) {
    cell.addEventListener('click', function () {
      calCells.forEach(function (c) { 
        c.classList.remove('active', 'bg-danger');
        c.classList.add('bg-dark');
      });
      this.classList.add('active', 'bg-danger');
      this.classList.remove('bg-dark');

      const day = this.getAttribute('data-day');
      const dayTitle = document.getElementById('selectedDayTitle');
      const dayInfo = document.getElementById('selectedDayInfo');

      if (dayTitle) {
        dayTitle.innerHTML = '<i class="bi bi-info-circle text-danger me-2"></i>Dia ' + day + ' de outubro';
      }

      const events = {
        '7': { tipo: 'Coordenação', titulo: 'Reunião pedagógica de alinhamento curricular.', desc: 'Alinhamento com docentes sobre os critérios bimestrais e entrega de planos.' },
        '14': { tipo: 'Evento Acadêmico', titulo: 'Feira de Ciências e Tecnologia no laboratório.', desc: 'Apresentação de projetos interdisciplinares desenvolvidos pelos alunos.' },
        '22': { tipo: 'Avaliação', titulo: 'Conselho de classe e fechamento bimestral.', desc: 'Reunião deliberativa para consolidação de menções e plano de recuperação.' },
        '24': { tipo: 'Atendimento', titulo: 'Plantão de dúvidas e atendimento pedagógico.', desc: 'Atendimento individualizado para esclarecimento de dúvidas da matéria.' }
      };

      if (dayInfo) {
        if (events[day]) {
          dayInfo.innerHTML =
            '<div class="badge bg-danger mb-2">' + events[day].tipo + '</div>' +
            '<h5 class="fw-bold text-white mb-2">' + events[day].titulo + '</h5>' +
            '<p class="text-white small mb-0">' + events[day].desc + '</p>';
        } else {
          dayInfo.innerHTML =
            '<div class="badge bg-dark border border-secondary mb-2">Atividade Normal</div>' +
            '<h5 class="fw-bold text-white mb-2">Dia Letivo Regular</h5>' +
            '<p class="text-white small mb-0">Grade de horários regular em funcionamento conforme planejamento sem alterações extraordinárias.</p>';
        }
      }
    });
  });
});
