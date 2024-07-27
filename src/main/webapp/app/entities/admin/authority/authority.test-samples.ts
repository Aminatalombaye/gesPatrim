import { IAuthority, NewAuthority } from './authority.model';

export const sampleWithRequiredData: IAuthority = {
  name: 'f8da84c7-46ef-4d15-b559-d117b3fdbda0',
};

export const sampleWithPartialData: IAuthority = {
  name: '34626b25-c9c6-4488-bf97-6635f07f3f61',
};

export const sampleWithFullData: IAuthority = {
  name: '8ca9fd0b-5947-4f09-9142-cd6d708eea24',
};

export const sampleWithNewData: NewAuthority = {
  name: null,
};

Object.freeze(sampleWithNewData);
Object.freeze(sampleWithRequiredData);
Object.freeze(sampleWithPartialData);
Object.freeze(sampleWithFullData);
