import { TestBed, async, inject } from '@angular/core/testing';

import { DeactiveGuard } from './deactive.guard';

describe('DeactiveGuard', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [DeactiveGuard]
    });
  });

  it('should ...', inject([DeactiveGuard], (guard: DeactiveGuard) => {
    expect(guard).toBeTruthy();
  }));
});
